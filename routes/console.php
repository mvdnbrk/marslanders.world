<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('inscriptions:retrieve-burned')
    ->dailyAt('6:00');

Schedule::command('marlanders:update-rarity')
    ->dailyAt('6:15');

Schedule::command('marslanders:cache-holder-count')
    ->hourly();

Schedule::command('doge:cache-price')
    ->hourly();
