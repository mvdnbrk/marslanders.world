<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('marslanders:retrieve-burned')
    ->dailyAt('5:00');

Schedule::command('marslanders:update-rarity')
    ->dailyAt('5:15');

Schedule::command('marslanders:retrieve-owners')
    ->dailyAt('5:30');

Schedule::command('marslanders:cache-holder-count')
    ->hourly();

Schedule::command('doge:cache-price')
    ->hourly();
