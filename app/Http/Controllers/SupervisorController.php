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
        $viewData['unassignedNumber'] = Task::where('department_assigned_to', Auth::user()->getDepartment()->getId())->where('progress', 'unassigned')->count();
        $viewData['assignedNumber'] = Task::where('department_assigned_to', Auth::user()->getDepartment()->getId())->where('progress', 'in progress')->count();
        return view('Supervisor.index')->with('viewData', $viewData);
    }
    public function unassignedView(){
        $viewData = [];
        $viewData['departmentMembers'] = User::where('department_id', Auth::user()->getDepartment()->getId())->get();
        $viewData['unassignedTasks'] = Task::where('department_assigned_to', Auth::user()->getDepartment()->getId())->where('progress', 'unassigned')->get();
        return view('Supervisor.unassigned')->with('viewData', $viewData);
    }
    public function assign(Request $request, $id){
       $assignedTask = Task::findOrFail($id);
       $assignedTask->setAssignedTo(intval($request->input('assigned_to')));
       $assignedTask->setProgress('in progress');
       $assignedTask->setDateAssigned(date('Y-m-d H:i:s'));
       $assignedTask->setSupervisedBy(Auth::user()->getId());
       $assignedTask->save();
       return redirect()->route('Supervisor.index');
    }
    public function assignedView(){
        $viewData = [];
        $viewData['title'] = 'Assigned Tasks';
        $viewData['assignedTasks'] = Task::where('progress', 'in progress')->get();
        return view('Supervisor.assigned')->with('viewData', $viewData);
    }
}