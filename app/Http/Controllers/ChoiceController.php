<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChoiceController extends Controller{
    public function check(){
        $viewData = [];
        $viewData['user'] = Auth::user();
        return view('choice')->with('viewData', $viewData);
    }
}