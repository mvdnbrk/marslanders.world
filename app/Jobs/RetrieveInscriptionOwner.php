<?php

namespace App\Jobs;

use App\Models\Inscription;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class RetrieveInscriptionOwner implements ShouldQueue
{
    use Queueable;

    public $tries = 1;

    protected string $apiUrl;

    public function __construct(protected string $inscriptionId)
    {
        $this->apiUrl = Str::of(
            config('services.ordinalswallet.base_url')
        )
            ->append('inscription/')
            ->append($this->inscriptionId)
            ->append('/outpoint');
    }

    public function handle(): void
    {
        if (! $inscription = Inscription::where('inscription_id', $this->inscriptionId)->first()) {
            Log::warning("Inscription with ID {$this->inscriptionId} not found.");

            return;
        }

        $response = Http::acceptJson()
            ->get($this->apiUrl);

        if ($response->successful()) {
            $inscription->update([
                'owner' => $response->json('owner'),
            ]);
        }

        if ($response->failed()) {
            Log::error('['.get_class($this).'] Failed to retrieve '.$this->apiUrl.' with status code: '.$response->status());
        }
    }
}
