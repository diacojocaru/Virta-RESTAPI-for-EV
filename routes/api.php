<?php

use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\StationsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->name('api.v1.')->group(function() {
    Route::apiResource('companies', CompaniesController::class);

    Route::get('stations/search', [StationsController::class, 'search'])->name('stations.search');
    Route::apiResource('stations', StationsController::class);
});
