<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ToDo\CreateToDo;
use App\Http\Livewire\ToDo;
use App\Http\Livewire\ToDo\EditToDo;
// use App\Http\Livewire\Halaman\Todo;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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


    // To do list routes
    Route::get('/to-do-today', function () {
        return view('to-do-today');
    })->name('to-do-today');
    Route::get('/to-do',ToDo::class)->name('to-do');

    Route::get('/to-do-completed', function () {
        return view('to-do-completed');
    })->name('to-do-completed');

    Route::get('/create-todo', CreateToDo::class)->name('todos.create');

    Route::get('/edit-to-do/{id}', EditToDo::class)->name('todos.edit');

    // Route::get('/to-do', function () {
    //     return view('livewire.to-do');
    // })->name('to-do');

});





require __DIR__.'/auth.php';
