<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function () {
    Route::post('/post',[PostController::class, 'store']);
    Route::post('/website/{id}/subscribe',[WebsiteController::class, 'subscribe']);
});
