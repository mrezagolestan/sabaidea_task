<?php
use Core\Route;

use App\Controllers\ReservationController;

Route::get('',ReservationController::class, 'index');
Route::get('reservations',ReservationController::class, 'index');
Route::get('reservations/:hourId/:date/reserve',ReservationController::class, 'reserve');
