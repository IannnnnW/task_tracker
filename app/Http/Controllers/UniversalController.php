<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Crypt;

class UniversalController extends Controller{
    public function profile(){
        $viewData = [];
        $viewData['user'] = Auth::user();
        return view('profile')->with('viewData',$viewData);
    }
}