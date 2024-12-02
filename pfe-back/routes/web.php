<?php

// routes/web.php

// routes/web.php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web'])->group(function() {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);

    Route::middleware('auth')->get('user', [AuthController::class, 'user']);
});
