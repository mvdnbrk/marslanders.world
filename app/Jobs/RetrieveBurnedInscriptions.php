<?php

namespace App\Jobs;

use App\Models\Inscription;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class RetrieveBurnedInscriptions implements ShouldQueue
{
    use Queueable;

    protected string $apiUrl;

    public function __construct()
    {
        $this->apiUrl = Str::of(
            config('services.ordinalswallet.base_url')
        )
            ->append('wallet/')
            ->append(config('doge.burn_address'));
    }

    public function handle(): void
    {
        $response = Http::timeout(60)
            ->acceptJson()
            ->get($this->apiUrl);

        if ($response->successful()) {
            collect($response->json('inscriptions'))
                ->filter(
                    fn ($item) => isset($item['collection']['slug'])
                        && $item['collection']['slug'] === 'mars-landers'
                )
                ->pluck('id')
                ->each(function ($inscriptionId) {
                    Inscription::where('inscription_id', $inscriptionId)
                        ->where('burned', false)
                        ->update([
                            'burned' => true,
                        ]);
                });
        }

        if ($response->failed()) {
            Log::error('['.get_class($this).'] Failed to retrieve '.$this->apiUrl.' with status code: '.$response->status());
        }
    }
}
