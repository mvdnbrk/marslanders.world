<?php

use App\Jobs\RetrieveBurnedInscriptions;

$schedule->call(function () {
    (new RetrieveBurnedInscriptions())->handle();
})->dailyAt('8:00');
