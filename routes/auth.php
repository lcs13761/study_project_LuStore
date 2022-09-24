<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Pecee\SimpleRouter\SimpleRouter;

/**
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 */

SimpleRouter::get('/login', [AuthenticatedSessionController::class, 'create']);

SimpleRouter::post('/login', [AuthenticatedSessionController::class, 'store']);