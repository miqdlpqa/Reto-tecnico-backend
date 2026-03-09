<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/divisions-data', function () {
    return DB::table('divisions')->get();
});
