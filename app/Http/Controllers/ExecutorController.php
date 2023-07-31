<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Crypt;

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
    public function select($id){
        $viewData = [];
        $viewData['task'] = Task::findOrFail($id);
        $viewData['executorComments'] = array(Task::findOrFail($id)->getComments())[0][Auth::user()->getName()] ?? [];
        return view('Executor.selected')->with('viewData', $viewData);
    }

    public function addcomment(Request $request){
        $task = Task::findOrFail($request->id);
        return view('Executor.addcomment', compact('task'));
    }
    public function savecomment(Request $request){
        $task = Task::findOrFail(Crypt::decrypt($request->id));
        $task->setComment($request->comment, $request->executor);
        $task->update();
        return response()->json($task);
    }
    public function markAsComplete(){
        $task = Task::findOrFail(request()->id);
        $task->setProgress('complete');
        $task->setDateCompleted(date('Y-m-d H:i:s'));
        $task->save();
        $notification = array('message'=>'Task Completed!', 'alert-type'=>'success');
        return redirect()->route('Executor.completed')->with($notification);
    }
}