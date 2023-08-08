<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;

class SupervisorController extends Controller{
    public function index(){
        $viewData = [];
        $viewData['unassignedBtn'] = 'Unassgined';
        $viewData['assignedBtn'] = 'Assigned';
        return view('Supervisor.index')->with('viewData', $viewData);
    }
    public function unassignedView(){
        $viewData = [];
        $viewData['unassignedTasks'] = Task::where('department_assigned_to', Auth::user()->getDepartment()->getId())->where('progress', 'unassigned')->get();
        return view('Supervisor.unassigned')->with('viewData', $viewData);
    }
    public function unassignedTaskView($id){
        $viewData = [];
        $viewData['unassignedTask'] = Task::findOrFail($id);
        $viewData['departmentMembers'] = User::where('department_id', Auth::user()->getDepartment()->getId())->get();
        return view('Supervisor.unassignedTask')->with('viewData', $viewData);
    }
    public function assign(Request $request, $id){
       $assignedTask = Task::findOrFail($id);
       $assignedTask->setAssignedTo(intval($request->input('assigned_to')));
       $assignedTask->setProgress('in progress');
       $assignedTask->setDateAssigned(date('Y-m-d H:i:s'));
       $assignedTask->setSupervisedBy(Auth::user()->getId());
       $assignedTask->setPriority($request->input('priority'));
       $assignedTask->save();
       return redirect()->route('Supervisor.unassigned');
    }
    public function assignedView(){
        $viewData = [];
        $viewData['title'] = 'Assigned Tasks';
        $viewData['assignedTasks'] = Task::where('progress', 'in progress')->get();
        return view('Supervisor.assigned')->with('viewData', $viewData);
    }
    public function completedTasks(){
        $completedTasks = Task::where('progress', 'complete')->where('supervised_by', Auth::user()->getId())->get();
        return view('Supervisor.completedtasks', compact('completedTasks'));
    }
    public function closedTasks(){
        $closedTasks = Task::where('progress', 'closed')->where('supervised_by', Auth::user()->getId())->get();
        return view('Supervisor.closed', compact('closedTasks'));
    }
}