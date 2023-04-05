<?php

use App\Controllers\TestController;
use App\Core\Route;

Route::get('/', [TestController::class, 'index']);

Route::post('/post', [TestController::class, 'post']);