<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserthController;

//use App\Http\Controllers\TaskController;
//Route::get('/', function () {return view('welcome');});
//Route::resource('tasks', TaskController::class);
Route::get('/', function () {
    // Redirect đến trang quản lý userth
    return redirect()->route('users.index');
});
Route::get('/users', [UserthController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserthController::class, 'create'])->name('users.create');
Route::post('/users', [UserthController::class, 'store'])->name('users.store');
Route::get('/users/{id}/edit', [UserthController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserthController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserthController::class, 'destroy'])->name('users.destroy');