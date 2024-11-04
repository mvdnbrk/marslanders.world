<?php

use App\Jobs\RetrieveBurnedInscriptions;
use Illuminate\Support\Facades\Schedule;

Schedule::job(
    new RetrieveBurnedInscriptions
)->dailyAt('8:00');
