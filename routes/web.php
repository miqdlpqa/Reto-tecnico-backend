<?php
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/run-migrate', function () {
    Artisan::call('migrate', ['--force' => true]);
    return nl2br(Artisan::output());
});

Route::get('/run-seed', function () {
    Artisan::call('db:seed', ['--force' => true]);
    return nl2br(Artisan::output());
});

Route::get('/tables', function () {
    return response()->json([
        'database' => DB::getDatabaseName(),
        'tables' => DB::select('SHOW TABLES')
    ]);
});

Route::get('/divisions-data', function () {
    return DB::table('divisions')->get();
});
