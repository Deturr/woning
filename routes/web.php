<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WoningController;
use Illuminate\Support\Facades\Route;

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them
| will be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    if (auth()->check()) {
        return view('woning.index'); 
    } else {
        return redirect()->route('login');
    }
});
#CRUD
Route::get('woning/create', [App\Http\Controllers\WoningController::class, 'create']);
Route::post('/woning/store', [WoningController::class, 'store'])->name('woning.store');
Route::get('woning/edit/{id}',   [App\Http\Controllers\WoningController::class, 'edit']);
Route::post('woning/update/{id}',   [App\Http\Controllers\WoningController::class, 'update']);
Route::get('woning/show/{id}',   [App\Http\Controllers\WoningController::class, 'show']);
Route::post('woning/destroy/{id}',  [App\Http\Controllers\WoningController::class, 'destroy']);

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('woning', [WoningController::class, 'index'])->name('woning.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
