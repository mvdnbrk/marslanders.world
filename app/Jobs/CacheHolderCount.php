<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Collection;
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
        $this->apiUrl = Str::of(config('services.doggy_market.base_url'))
            ->append('nfts/marslanders/holders')
            ->toString();
    }

    public function handle(): void
    {
        $headers = [
            'User-Agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36',
            'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8',
            'Accept-Language' => 'nl-NL,nl;q=0.5',
            'Sec-CH-UA' => '"Not(A:Brand";v="99", "Brave";v="133", "Chromium";v="133"',
            'Sec-CH-UA-Mobile' => '?0',
            'Sec-CH-UA-Platform' => '"macOS"',
            'Sec-Fetch-Dest' => 'document',
            'Sec-Fetch-Mode' => 'navigate',
            'Sec-Fetch-Site' => 'none',
            'Sec-Fetch-User' => '?1',
            'Sec-GPC' => '1',
            'Upgrade-Insecure-Requests' => '1',
        ];

        $response = Http::withHeaders($headers)
            ->acceptJson()
            ->get($this->apiUrl);

        if ($response->successful()) {
            $count = Collection::make($response->json())->count();

            Cache::put('holder_count', $count);
        }

        if ($response->failed()) {
            Log::error('['.get_class($this).'] Failed to retrieve '.$this->apiUrl.' with status code: '.$response->status().' '.collect($response->headers())->__toString());
        }
    }
}
