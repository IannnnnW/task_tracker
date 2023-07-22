<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class ExecutorController extends Controller{
    public function inprogress(){
        $viewData = [];
        $viewData['assignedTasks'] = Task::where('assigned_to', Auth::user()->getId())->where('progress', 'in progress')->get();
        return view('Executor.inprogress')->with('viewData', $viewData);
    }
    public function completed(){
        $viewData = [];
        $viewData['completedTasks'] = Task::where('assigned_to', Auth::user()->getId())->where('progress', 'complete')->get();
        return view('Executor.completed')->with('viewData', $viewData);
    }
    public function execute($id){
        $viewData = [];
        $viewData['task'] = Task::findOrFail($id);
        return view('Executor.selected')->with('viewData', $viewData);
    }
}