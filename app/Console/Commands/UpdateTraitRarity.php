<?php

namespace App\Console\Commands;

use App\Models\InscriptionTrait;
use Illuminate\Console\Command;

class UpdateTraitRarity extends Command
{
    protected $signature = 'marslanders:update-rarity';

    protected $description = 'Update the trait rarity of all Mars Landers';

    public function handle()
    {
        $this->info('Updating the trait rarity of Marslanders:');
        InscriptionTrait::getStatistics()->each(function ($item) {
            InscriptionTrait::where('type', $item->type)
                ->where('value', $item->value)
                ->update([
                    'rarity' => $item->percentage,
                ]);

            $this->line($item->type.' '.$item->value.' is now: '.$item->percentage);
        });

        return Command::SUCCESS;
    }
}
