<?php

use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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
})->name('welcome');

Route::group(['middleware' => ['auth', 'prevent-back-history']], function(){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/monthly-hours', [PageController::class, 'monthlyHours'])->name('monthly-hours');
    Route::post('/tasks/new', [TasksController::class, 'new']);
    Route::get('/tasks/list', [TasksController::class, 'list'])->name('list');
});

require __DIR__.'/auth.php';
