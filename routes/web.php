<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\Admin\TypesController;
use App\Http\Controllers\Guest\PageController as GuestPageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/project',[GuestPageController::class, 'index'])->name('guest.index');
Route::get('/project/{project}', [GuestPageController::class, 'show'])->name('guest.show');
Route::get('/project/type/{type}', [GuestPageController::class, 'type'])->name('guest.type');
Route::get('/project/technology/{technology}', [GuestPageController::class, 'technology'])->name('guest.technology');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('project',ProjectController::class);
    Route::resource('type', TypesController::class);
    Route::resource('technology', TechnologyController::class);
});



require __DIR__.'/auth.php';
