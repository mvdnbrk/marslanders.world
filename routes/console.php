<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('inscriptions:retrieve-burned')
    ->dailyAt('6:00');

Schedule::command('doge:cache-price')->hourly();
