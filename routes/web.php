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
    Route::get('/request', 'App\Http\Controllers\RequestController@dashboard')->name('Requestor.dashboard');
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
    Route::get('/executor/selected/{id}', 'App\Http\Controllers\ExecutorController@select')->name('Executor.selected');
    Route::get('/executor/addcomment', 'App\Http\Controllers\ExecutorController@addcomment')->name('addcomment');
    Route::post('/executor/savecomment', 'App\Http\Controllers\ExecutorController@savecomment')->name('savecomment');
    Route::post('/executor/completed', 'App\Http\Controllers\ExecutorController@markAsComplete')->name('markascomplete');
    Route::get('/requestor/completed', 'App\Http\Controllers\RequestController@completedRequests')->name('Requestor.completedrequests');
    Route::post('/requestor/close', 'App\Http\Controllers\RequestController@markAsClosed')->name('markasclosed');
    Route::get('/requestor/closedrequests', 'App\Http\Controllers\RequestController@closedRequests')->name('Requestor.closedrequests');
    Route::get('/profile', 'App\Http\Controllers\UniversalController@profile')->name('profile');
    Route::get('/requestor/showdetails', 'App\Http\Controllers\RequestController@showdetails')->name('showdetails');
    Route::get('/supervisor/completedtasks', 'App\Http\Controllers\SupervisorController@completedTasks')->name('Supervisor.completedtasks');
    Route::get('/supervisor/closedtasks', 'App\Http\Controllers\SupervisorController@closedTasks')->name('Supervisor.closed');
    Route::get('/executor/dashboard', 'App\Http\Controllers\ExecutorController@dashboard')->name('Executor.dashboard');
});