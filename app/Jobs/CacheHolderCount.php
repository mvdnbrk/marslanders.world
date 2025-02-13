<?php

namespace App\Jobs;

use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

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
        $response = Http::withHeaders([
            'User-Agent' => config('app.url'),
        ])
            ->acceptJson()
            ->get($this->apiUrl);

        if ($response->successful()) {
            $count = Collection::make($response->json())->count();

            Cache::put('holder_count', $count);
        }
    }
}
