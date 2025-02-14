<?php

namespace App\Console\Commands;

use App\Jobs\RetrieveBurnedInscriptions;
use Illuminate\Console\Command;

class RetrieveBurnedInscriptionsCommand extends Command
{
    protected $signature = 'marslanders:retrieve-burned';

    protected $description = 'Retrieve burned Mars Lander inscriptions';

    public function handle()
    {
        RetrieveBurnedInscriptions::dispatchSync();

        return Command::SUCCESS;
    }
}
