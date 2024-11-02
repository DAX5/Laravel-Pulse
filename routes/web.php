<?php

use App\Http\Controllers\MetricsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->prefix('metrics')->group(function () {
    Route::get('/generate-job', [MetricsController::class, 'generateJob'])->name('metrics.generateJob');
    Route::get('/generate-slow-job', [MetricsController::class, 'generateSlowJob'])->name('metrics.generateSlowJob');
    Route::get('/generate-slow-query', [MetricsController::class, 'generateSlowQuery'])->name('metrics.generateSlowQuery');
    Route::get('/hit-cache', [MetricsController::class, 'hitCache'])->name('metrics.hitCache');
    Route::get('/forget-cache', [MetricsController::class, 'forgetCache'])->name('metrics.forgetCache');
    Route::get('/slow-request', [MetricsController::class, 'slowRequest'])->name('metrics.slowRequest');
    Route::get('/slow-outgoing-request', [MetricsController::class, 'slowOutgoingRequest'])->name('metrics.slowOutgoingRequest');
    Route::get('/make-exception', [MetricsController::class, 'makeException'])->name('metrics.makeException');
});

require __DIR__.'/auth.php';
