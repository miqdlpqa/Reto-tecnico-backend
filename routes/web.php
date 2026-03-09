<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/db-test', function () {
    try {
        DB::connection()->getPdo();
        return response()->json([
            "status" => "ok",
            "message" => "DB conectada correctamente"
        ]);
    } catch (\Throwable $e) {
        return response()->json([
            "status" => "error",
            "message" => $e->getMessage()
        ], 500);
    }
});
