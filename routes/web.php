<?php

use App\Http\Controllers\OtpController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PromptController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::resource('/prompts', PromptController::class)->except(['update', 'create']);
Route::get('/prompts', [PromptController::class, 'index']);
Route::get('/prompts/create', [PromptController::class, 'create'])->middleware(['auth']);
Route::post('/prompts', [PromptController::class, 'store'])->middleware(['auth']);
Route::get('/prompts/{prompt}', [PromptController::class, 'show']);
Route::get('/prompts/{prompt}/edit', [PromptController::class, 'edit'])->middleware(['auth'])->can('edit-own-prompt', 'prompt');
Route::post('/prompts/{prompt}', [PromptController::class, 'update'])->middleware(['auth'])->can('edit-own-prompt', 'prompt');

Route::get("/register", [UserController::class, "show"]);
Route::post("/register", [UserController::class, "create"]);

Route::get("/login", [SessionController::class, "show"])->name("login");
Route::post("/login", [SessionController::class, "create"]);
Route::get('/login/otp', [OtpController::class, 'show'])->can('access-tfa')->name('otp');
Route::post('/login/otp', [OtpController::class, 'store'])->can('access-tfa')->name('otp');
Route::post("/logout", [SessionController::class, "destroy"]);


Route::get('/profile/{user}', [ProfileController::class, 'show'])->middleware(['auth']);
Route::post('/profile/{user}/follow', [ProfileController::class, 'follow'])->middleware(['auth']);
Route::post('/profile/{user}/unfollow', [ProfileController::class, 'unfollow'])->middleware(['auth']);