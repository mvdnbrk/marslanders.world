<?php

namespace App\Jobs;

use App\Models\Inscription;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

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
        $response = Http::acceptJson()
            ->get($this->apiUrl);

        if ($response->successful()) {
            collect($response->json('inscriptions'))
                ->filter(
                    fn ($item) =>
                        isset($item['collection']['slug'])
                        && $item['collection']['slug'] === 'mars-landers'
                )
                ->pluck('id')
                ->each(function ($inscriptionId) {
                    Inscription::where('inscription_id', $inscriptionId)
                        ->update([
                            'burned' => true
                        ]);
                });
        }
    }
}
