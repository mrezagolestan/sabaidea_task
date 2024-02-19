<?php
use Core\Route;

use App\Controllers\ReservationController;

Route::get('',ReservationController::class, 'index');
Route::get('reservation',ReservationController::class, 'index');
Route::get('reservation/:id/reserve',ReservationController::class, 'reserve');
