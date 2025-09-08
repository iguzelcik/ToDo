<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use \App\Http\Controllers\TodoController;
use \App\Http\Controllers\Auth\AuthenticatedSessionController;
use \App\Http\Controllers\Auth\RegisteredUserController;
Route::get('/', [TodoController::class, 'index'])->name('todos.index');

//Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
//Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
//Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
//Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
//Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
//Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
//Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

Route::middleware('auth')->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('todos', TodoController::class);
    Route::put('/todos/{todo}/check', [TodoController::class, 'check'])->name('todos.check');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::post('/profile', [AuthenticatedSessionController::class, 'profile'])->name('profile.edit');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register.create');
    Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');
});



