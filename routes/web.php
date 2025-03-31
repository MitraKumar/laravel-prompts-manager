<?php

use App\Http\Controllers\OtpController;
use App\Http\Controllers\PromptController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/login/otp', [OtpController::class, 'show'])->name('otp');
Route::post('/login/otp', [OtpController::class, 'store'])->name('otp');

Route::get('/', function () {
    return view('welcome');
});

// Route::resource('/prompts', PromptController::class)->except(['update', 'create']);
Route::get('/prompts', [PromptController::class, 'index']);
Route::get('/prompts/create', [PromptController::class, 'create'])->middleware(['auth']);
Route::post('/prompts', [PromptController::class, 'store'])->middleware(['auth']);
Route::get('/prompts/{id}', [PromptController::class, 'show']);
Route::get('/prompts/{id}/edit', [PromptController::class, 'edit'])->middleware(['auth']);
Route::post('/prompts/{id}', [PromptController::class, 'update'])->middleware(['auth']);

Route::get("/register", [UserController::class, "show"]);
Route::post("/register", [UserController::class, "create"]);

Route::get("/login", [SessionController::class, "show"])->name("login");
Route::post("/login", [SessionController::class, "create"]);
Route::post("/logout", [SessionController::class, "destroy"]);