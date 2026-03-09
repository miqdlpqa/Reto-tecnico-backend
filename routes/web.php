<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/db-test', function () {
    DB::connection()->getPdo();
    return "DB conectada";
});
