<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('authentication')->group(function(){
    Route::get('/choice', 'App\Http\Controllers\ChoiceController@check')->name('choice');
    Route::get('/request', 'App\Http\Controllers\RequestController@index')->name('Requestor.index');
    Route::get('/addtask', 'App\Http\Controllers\TaskRequestController@index')->name('Requestor.addtask');
    Route::post('/savetask', 'App\Http\Controllers\RequestController@save')->name('Requestor.save');
    Route::get('/supervisor', 'App\Http\Controllers\SupervisorController@index')->name('Supervisor.index');
    Route::get('/requestor/pending', 'App\Http\Controllers\RequestController@pending')->name('Requestor.pending');
    Route::delete('/requestor/pending/delete/{id}', 'App\Http\Controllers\RequestController@delete')->name('Requestor.pending.delete');
    Route::get('/requestor/pending/edit/{id}', 'App\Http\Controllers\RequestController@edit')->name('Requestor.pending.edit');
    Route::put('/requestor/pending/save-edit/{id}', 'App\Http\Controllers\RequestController@saveEdit')->name('Requestor.pending.save');
    Route::get('/supervisor/unassigned', 'App\Http\Controllers\SupervisorController@unassignedView')->name('Supervisor.unassigned');
    Route::get('/supervisor/unassignedTask/{id}','App\Http\Controllers\SupervisorController@unassignedTaskView')->name('Supervisor.unassignedTask');
    Route::put('/supervisor/unassigned/{id}', 'App\Http\Controllers\SupervisorController@assign')->name('Supervisor.save');
    Route::get('/supervisor/assigned', 'App\Http\Controllers\SupervisorController@assignedView')->name('Supervisor.assigned');
    Route::get('/executor', 'App\Http\Controllers\ExecutorController@inprogress')->name('Executor.inprogress');
    Route::get('/executor/completed', 'App\Http\Controllers\ExecutorController@completed')->name('Executor.completed');
    Route::get('/exector/selected/{id}', 'App\Http\Controllers\ExecutorController@execute')->name('Executor.selected');
});