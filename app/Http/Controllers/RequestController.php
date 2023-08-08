<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Department;

class RequestController extends Controller{
    public function dashboard(){
        $completedRequests = count(Task::where('created_by', Auth::user()->getId())->where('progress', 'complete')->get());
        $incompleteRequests = count(Task::where('progress', 'in progress')->where('created_by', Auth::user()->getId())->get());
        $closedRequests = count(Task::where('progress', 'closed')->where('created_by', Auth::user()->getId())->get());
        $tasks = Task::where('created_by', Auth::user()->getId())->get();
        $completionRate = 0;
        foreach($tasks as $task){
            if(date('d/M/Y', strtotime($task->getCreatedAt())) === date('d/M/Y', strtotime($task->getDateCompleted()))){
                $completionRate = $completionRate + 1;
            }
        }
        return view('Requestor.dashboard', compact('completedRequests', 'incompleteRequests', 'closedRequests', 'completionRate'));
    }
    public function save(Request $request){
        // dd($request);
        Task::validate($request);
        $newTask = new Task();
        $newTask->setTitle($request->input('title'));
        $newTask->setMessage($request->input('message'));
        $newTask->setDepartmentAssignedTo(intval($request->input('department_assigned_to')));
        $newTask->setCreatedBy(Auth::user()->getId());
        $newTask->save();

        if ($request->hasFile('image')) {
            $imageName = $newTask->getId().".".$request->file('image')->extension();
            Storage::disk('public')->put(
            $imageName,
            file_get_contents($request->file('image')->getRealPath())
            );
            $newTask->setImage($imageName);
        }
        $newTask->save();

        return redirect()->route('Requestor.pending');
    }
    public function pending(){
        $viewData = [];
        $viewData['title'] = 'Pending & Unassigned';
        $viewData['pendingTasks'] = Task::whereIn('progress', ['unassigned', 'in progress'])->where('created_by', Auth::id())->get();
        return view('Requestor.pending')->with('viewData', $viewData);
    }
    public function edit($id){
        $viewData = [];
        $viewData['title'] = 'Edit Task';
        $viewData['task'] = Task::findOrFail($id);
        $viewData['departments'] = Department::all();
        return view('Requestor.edit')->with('viewData', $viewData);
    }
    public function delete($id){
        Task::destroy($id);
        return back();
    }
    public function saveEdit(Request $request, $id){
        Task::validate($request);
        $task = Task::findOrFail($id);
        $task->setTitle($request->input('title'));
        $task->setMessage($request->input('message'));
        $task->setDepartmentAssignedTo($request->input('department_assigned_to'));
        if($request->hasFile('image')){
            $imageName = $task->getImage().".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName, file_get_contents($request->file('image')->getRealPath())
            );
            $task->setImage($imageName);
        }

        $task->save();
        return redirect()->route('Requestor.pending');
    }
    public function completedRequests(){
        $completedrequests = Task::where('progress', 'complete')->where('created_by', Auth::user()->getId())->get();
        return view('Requestor.completedrequests')->with('completedrequests', $completedrequests);
    }
    public function markAsClosed(Request $request){
        $completedrequest = Task::findOrFail($request->id);
        $completedrequest->setProgress('closed');
        $completedrequest->setDateClosed(date('Y-m-d H:i:s'));
        $completedrequest->update();
        return response()->json($completedrequest);
    }
    public function closedRequests(){
        $viewData = [];
        $viewData['closedRequests'] = Task::where('progress', 'closed')->where('created_by', Auth::user()->getId())->get();
        $viewData['title'] = 'My Closed Tasks';
        return view('Requestor.closedrequests')->with('viewData', $viewData);
    }
    public function showdetails(Request $request){
        $task = Task::findOrFail($request->id);
        $createdAt = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $task->getCreatedAt());
        $completedAt = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $task->getDateCompleted());
        $differenceInDays = $createdAt->diffInDays($completedAt);
        $differenceInHours = $createdAt->diffInHours($completedAt);
        $differenceInMinutes = $createdAt->diffInMinutes($completedAt);
        $differenceInWeeks = $createdAt->diffInWeeks($completedAt);
        return view('Requestor.showdetails', compact('task','differenceInDays','differenceInHours','differenceInMinutes', 'differenceInWeeks'));
    }
}