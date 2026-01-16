<?php

namespace App\Console\Commands;

use App\Models\Inscription;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;
use App\Jobs\RetrieveInscriptionOwner;
use Illuminate\Database\Eloquent\Collection;

class RetrieveInscriptionOwnersCommand extends Command
{
    protected $signature = 'marslanders:retrieve-owners';

    protected $description = 'Retrieve owners for all Mars Lander inscriptions';

    public function handle()
    {
        $totalIndex = 0;

        Inscription::chunk(200, function (Collection $inscriptions) use (&$totalIndex) {
            foreach ($inscriptions as $inscription) {
                RetrieveInscriptionOwner::dispatch($inscription->inscription_id)
                    ->delay(Carbon::now()->addSeconds($totalIndex * 4));

                $totalIndex++;
            }

            $this->info("Dispatched a batch of " . $inscriptions->count() . " jobs.");
        });

        $this->info("All jobs have been dispatched succesfully!");

        return Command::SUCCESS;
    }
}
