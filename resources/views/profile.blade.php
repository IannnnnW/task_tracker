@extends('layouts.in-app')
@section('aside')
    <a href="{{ route('Requestor.index') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-clipboard"></i> Dashboard</a>
    <a href="{{ route('Requestor.addtask') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-plus-circle"></i> Add Task</a>
    <a href="{{ route('Requestor.pending') }}" class="list-group-item list-group-item-action bg-light d-flex"><i class="bi bi-clock mr-2"></i> In Progress and Unassigned</a>
    <a href="{{ route('Requestor.completedrequests') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-list-check"></i> Completed</a>
    <a href="{{ route('Requestor.closedrequests') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-collection"></i> Closed</a>
    <a href="{{ route('profile') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-person-gear"></i></i> Profile</a>
    <a href="{{ route('choice') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-toggles"></i> Switch Role</a>
@endsection 
@section('content')
<div class="d-flex justify-content-center m-5">
    <div class="card d-flex justify-content-center align-items-center" style="width:300px;">
        <img src="{{asset('/img/person-circle.svg')}}"/>
        <h6 class="text-center">{{$viewData['user']->getName()}}</h6>
        <h6 class="text-center">{{$viewData['user']->getDepartment()->name}}</h6>
        <h6 class="text-center">{{$viewData['user']->getRole()->role}}</h6>
        <h6 class="text-center">{{$viewData['user']->getEmail()}}</h6>
    </div>
</div>
@endsection
