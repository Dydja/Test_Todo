<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;

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

Route::get('/', [TodosController::class,"list"])->name("todo.list");
Route::Post('/action/add', [TodosController::class,"store"])->name('todo.save');;
Route::get('/action/done/{id}',[TodosController::class,"markAsDone"])->name('todo.done');;
Route::get('/action/delete/{id}',[TodosController::class,"deleteTodo"])->name('todo.delete');;


/*LES api*/

Route::get('/api/concert', ['App\Http\Controllers\ApiControler', 'listApi']);
Route::get('/api', ['App\Http\Controllers\ApiControler', 'create']);
Route::post('/api/concert/add', ['App\Http\Controllers\ApiControler', 'store'])->name('save');
Route::delete('/api/concert/{id}', ['App\Http\Controllers\ApiControler', 'deleteApi']);

//../database/database.sqlite
