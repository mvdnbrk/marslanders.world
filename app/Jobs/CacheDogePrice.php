<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CacheDogePrice implements ShouldQueue
{
    use Queueable;

    protected string $apiUrl;

    public function __construct()
    {
        $this->apiUrl = Str::of(config('services.coinmarketcap.base_url'))
            ->append('cryptocurrency/quotes/latest?symbol=DOGE')
            ->toString();
    }

    public function handle(): void
    {
        $response = Http::withHeaders([
            'X-CMC_PRO_API_KEY' => config('services.coinmarketcap.api_key'),
        ])
            ->acceptJson()
            ->get($this->apiUrl);

        if ($response->successful()) {
            Cache::put('doge_price', $response->json('data.DOGE.quote.USD.price'));
        }

        if ($response->failed()) {
            Log::error('['.get_class($this).'] Failed to retrieve '.$this->apiUrl.' with status code: '.$response->status());
        }
    }
}
