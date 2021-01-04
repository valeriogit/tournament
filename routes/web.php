<?php

use Illuminate\Support\Facades\Route;
use Valeriogit\Tournament\Http\Controllers\TournamentController;

Route::get('/', [TournamentController::class, 'index']);
Route::get('/show', [TournamentController::class, 'show']);
