<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Role;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('Admin.index', [
            'users' => DB::table('users')->paginate(10)
        ]);
    }
    public function DeleteUser()
    {
        $user = User::findOrFail(request()->id)->first();
        return view('Admin.deleteuserform', compact('user'));
    }

    public function RemoveUser()
    {
        User::destroy(request()->userId);
    }
    public function ShowEditUser()
    {
        $user = User::findOrFail(request()->id)->first();
        $departments = Department::all();
        $roles = Role::all();
        return view('Admin.edituserform', compact('user', 'departments', 'roles'));
    }
    public function SaveUserEdit()
    {
        $user = User::findOrFail(request()->userId)->first();
        $user->name = request()->username;
        $user->email = request()->email;
        $user->department_id = intval(request()->department);
        $user->role_id = intval(request()->role);
        $user->save();
        return response()->json($user);
    }
}
