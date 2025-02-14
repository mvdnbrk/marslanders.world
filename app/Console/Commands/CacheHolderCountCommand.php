<?php

namespace App\Console\Commands;

use App\Jobs\CacheHolderCount;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class CacheHolderCountCommand extends Command
{
    protected $signature = 'marslanders:cache-holder-count';

    protected $description = 'Cache the holder count of Marslanders';

    public function handle()
    {
        CacheHolderCount::dispatchSync();

        $this->info('The current holder count is '.Cache::get('holder_count', default: 'unknown'));

        return Command::SUCCESS;
    }
}
