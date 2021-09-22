<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CommandController;
use App\Http\Controllers\ProblemController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AnnotationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->prefix('project')->name('project.')->group(function () {
    Route::get('/index', [ProjectController::class, 'index'])->name('index');
    Route::get('/create', [ProjectController::class, 'create'])->name('create');
    Route::get('/show/{id}', [ProjectController::class, 'show'])->name('show');
    Route::post('/store', [ProjectController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [ProjectController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [ProjectController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [ProjectController::class, 'delete'])->name('delete');
    Route::get('/updateStatus/{id}', [ProjectController::class, 'updateStatus'])->name('updateStatus');
    Route::get('/archived', [ProjectController::class, 'archived'])->name('archived');
    Route::get('/restore/{id}', [ProjectController::class, 'restore'])->name('restore');
});
Route::middleware(['auth:sanctum', 'verified'])->prefix('annotation')->name('annotation.')->group(function () {
    Route::get('/index', [AnnotationController::class, 'index'])->name('index');
    Route::get('/create/{project_id?}', [AnnotationController::class, 'create'])->name('create');
    Route::post('/store', [AnnotationController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [AnnotationController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [AnnotationController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [AnnotationController::class, 'delete'])->name('delete');
});
Route::middleware(['auth:sanctum', 'verified'])->prefix('command')->name('command.')->group(function () {
    Route::get('/index', [CommandController::class, 'index'])->name('index');
    Route::get('/create/{project_id?}', [CommandController::class, 'create'])->name('create');
    Route::post('/store', [CommandController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [CommandController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [CommandController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [CommandController::class, 'delete'])->name('delete');

});
Route::middleware(['auth:sanctum', 'verified'])->prefix('task')->name('task.')->group(function () {
    Route::get('/index', [TaskController::class, 'index'])->name('index');
    Route::get('/create/{project_id?}', [TaskController::class, 'create'])->name('create');
    Route::post('/store', [TaskController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [TaskController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [TaskController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [TaskController::class, 'delete'])->name('delete');
    Route::get('/updateStatus/{id}', [TaskController::class, 'updateStatus'])->name('updateStatus');
});

Route::middleware(['auth:sanctum', 'verified'])->prefix('problem')->name('problem.')->group(function () {
    Route::get('/index', [ProblemController::class, 'index'])->name('index');
    Route::get('/create/{project_id?}', [ProblemController::class, 'create'])->name('create');
    Route::post('/store', [ProblemController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [ProblemController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [ProblemController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [ProblemController::class, 'delete'])->name('delete');
    Route::get('/updateStatus/{id}', [ProblemController::class, 'updateStatus'])->name('updateStatus');
});
