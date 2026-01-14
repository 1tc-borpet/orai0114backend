<?php

use App\Http\Controllers\Api\ChallengeController;
use Illuminate\Support\Facades\Route;

Route::apiResource('challenges', ChallengeController::class);
