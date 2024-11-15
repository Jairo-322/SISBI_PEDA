<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PersonaController;
use App\Http\Controllers\Admin\ProgramaController;
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

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get ('home', [HomeController::class, 'render'])->name('home.index');
    //PROGRAMA
    Route::get('Carrera-Profesional',[ProgramaController::class, 'index'])->name('programa.index');	
    Route::post('Carrera-Profesional',[ProgramaController::class, 'store'])->name('programa.store');
    Route::put('Carrera-Profesional/{id}',[ProgramaController::class, 'update'])->name('programa.update');
    Route::delete('Carrera-Profesional/{id}',[ProgramaController::class, 'destroy'])->name('programa.destroy');
    //PERSONA
    Route::get('Persona',[PersonaController::class, 'index'])->name('persona.index');
    Route::post('Persona',[PersonaController::class, 'store'])->name('persona.store');
    Route::put('Persona/{id}',[PersonaController::class, 'update'])->name('persona.update');
    Route::delete('Persona/{id}',[PersonaController::class, 'destroy'])->name('persona.destroy');
});

require __DIR__.'/auth.php';
