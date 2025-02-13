<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('inscriptions:retrieve-burned')
    ->dailyAt('6:00');

Schedule::command('marslanders:update-rarity')
    ->dailyAt('6:15');

Schedule::command('doge:cache-price')->hourly();
