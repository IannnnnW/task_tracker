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
<h3 class="text-center">DashBoard</h3>
<div class="container-fluid justify-content-center d-flex pt-5">
    <div class="m-3"></div>
    
</div>
@endsection