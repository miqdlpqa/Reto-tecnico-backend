<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/tables', function () {
    return DB::select('SHOW TABLES');
});
