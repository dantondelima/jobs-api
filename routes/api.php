<?php

declare(strict_types=1);

use App\Http\Controllers\Api\ApiAuthController;
use Illuminate\Support\Facades\Route;

Route::post('login', [ApiAuthController::class, 'login']);
