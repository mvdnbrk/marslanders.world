<?php

namespace App\Console\Commands;

use App\Jobs\CacheDogePrice;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class CacheDogePriceCommand extends Command
{
    protected $signature = 'doge:cache-price';

    protected $description = 'Cache the Doge price';

    public function handle()
    {
        CacheDogePrice::dispatchSync();

        $this->info('The current Doge price is '.Cache::get('doge_price', default: 'unknown'));
    }
}
