@extends('layouts.in-app')
@section('aside')
    <a href="{{ route('Executor.dashboard') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-clipboard"></i> Dashboard</a>
    <a href="{{ route('Executor.completed') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-list-check"></i> Completed & Closed</a>
    <a href="{{ route('Executor.inprogress') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-clock mr-2"></i> Assigned </a>
    <a href="{{ route('profile') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-person-gear"></i> Profile</a>
    <a href="{{ route('choice') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-toggles"></i> Switch Role</a>
@endsection
@section('content')
<h1 class="text-center mb-5">Executor's Dashboard</h1>
<div class="d-flex flex-column justify-content-center align-items-center">
    <div class="d-flex justify-content-between" style="width:500px;">
        <a class="card d-flex align-items-center justify-content-center text-decoration-none mb-5" style="width:220px;height:200px;">
            <h2 class="align-self-center">{{$incompleteTasks}}<i class="bi bi-hourglass-split"></i></h2>
            <h3 class="align-self-center">In Progress</h3>
        </a>
        <a class="card d-flex align-items-center justify-content-center text-decoration-none" style="width:220px;height:200px;">
            <h2 class="align-self-center">{{$completedTasks}}<i class="bi bi-check2"></i></h2>
            <h3 class="align-self-center">Complete</h3>
        </a>
    </div>
    <div class="d-flex justify-content-between" style="width:500px;height:600px;">
        <a class="card d-flex align-items-center justify-content-center text-decoration-none" style="width:220px;height:200px;">
            <h2 class="">{{$closedTasks}}<i class="bi bi-check2-all"></i></h2>
            <h3 class="">Closed Tasks</h3>
        </a>
        <a class="card d-flex align-items-center justify-content-center text-decoration-none" style="width:220px;height:200px;">
            <h2 class="">{{$completionRate}}<i class="bi bi-graph-up-arrow"></i></h2><small>/(perday)</small>
            <h3 class="">Completion Rate</h3>
        </a>
    </div>
</div>
@endsection