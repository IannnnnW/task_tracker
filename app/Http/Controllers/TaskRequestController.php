<?php
namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Department;

class TaskRequestController extends Controller{
    public function index(){
        $viewData = [];
        $viewData['selectedDepartmentId'] = '1';
        $viewData['title'] = 'Add Request';
        $viewData['departments'] =  Department::all();
        return view('Requestor.addtask')->with('viewData', $viewData);
    }
}