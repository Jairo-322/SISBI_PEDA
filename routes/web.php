<?php

use App\Http\Controllers\Admin\EditorialController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\NacionalidadController;
use App\Http\Controllers\Admin\PersonaController;
use App\Http\Controllers\Admin\ProgramaController;
use App\Http\Controllers\Admin\AutorController;
use App\Http\Controllers\Admin\CategoriaController;
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
    //NACIONALIDAD
    Route::get('Nacionalidad',[NacionalidadController::class, 'index'])->name('nacionalidad.index');
    Route::post('Nacionalidad',[NacionalidadController::class, 'store'])->name('nacionalidad.store');
    Route::put('Nacionalidad/{id}',[NacionalidadController::class, 'update'])->name('nacionalidad.update');
    Route::delete('Nacionalidad/{id}',[NacionalidadController::class, 'destroy'])->name('nacionalidad.destroy');
    //EDITORIALES
    Route::get('Editorial',[EditorialController::class,'index'])->name('editorial.index');
    Route::post('Editorial',[EditorialController::class, 'store'])->name('editorial.store');
    Route::put('Editorial/{id}',[EditorialController::class, 'update'])->name('editorial.update');
    Route::delete('Editorial/{id}',[EditorialController::class, 'destroy'])->name('editorial.destroy');
    //AUTORES
    Route::get('Autor',[AutorController::class,'index'])->name('autor.index');
    Route::post('Autor',[AutorController::class, 'store'])->name('autor.store');
    Route::put('Autor/{id}',[AutorController::class, 'update'])->name('autor.update');
    Route::delete('Autor/{id}',[AutorController::class, 'destroy'])->name('autor.destroy');
    //CATEGORIAS
    Route::get('Categoria',[CategoriaController::class,'index'])->name('categoria.index');
    Route::post('Categoria',[CategoriaController::class, 'store'])->name('categoria.store');
    Route::put('Categoria/{id}',[CategoriaController::class, 'update'])->name('categoria.update');
    Route::delete('Categoria/{id}',[CategoriaController::class, 'destroy'])->name('categoria.destroy');
});

require __DIR__.'/auth.php';
