<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CacheHolderCount implements ShouldQueue
{
    use Queueable;

    protected string $apiUrl;

    public function __construct()
    {
        $this->apiUrl = Str::of(config('services.ordinalswallet.base_url'))
            ->append('collection/mars-landers/stats')
            ->toString();
    }

    public function handle(): void
    {
        $response = Http::acceptJson()
            ->get($this->apiUrl);

        if ($response->successful()) {
            Cache::put('holder_count', $response->json('owners'));
        }

        if ($response->failed()) {
            Log::error('['.get_class($this).'] Failed to retrieve '.$this->apiUrl.' with status code: '.$response->status().' '.collect($response->headers())->__toString());
        }
    }
}
