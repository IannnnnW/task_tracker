@extends('layouts.in-app')
@section('aside')
    <a href="{{ route('Supervisor.index') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-clipboard"></i> Dashboard</a>
    <a href="{{ route('Supervisor.unassigned') }}" class="list-group-item list-group-item-action bg-light d-flex"><i class="bi bi-clock mr-2"></i> Unassigned</a>
    <a href="{{ route('Supervisor.assigned') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-plus-circle"></i> Assigned</a>
    <a href="#" class="list-group-item list-group-item-action bg-light"><i class="bi bi-list-check"></i> Completed</a>
    <a href="#" class="list-group-item list-group-item-action bg-light"><i class="bi bi-collection"></i> Closed</a>
    <a href="#" class="list-group-item list-group-item-action bg-light"><i class="bi bi-person-gear"></i></i> Profile</a>
    <a href="{{ route('choice') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-toggles"></i> Switch Role</a>
@endsection
@section('content')
<h3 class="text-left ml-4 align-self-start">Pending Assignment</h3>
        @foreach($viewData['unassignedTasks'] as $task)
        <a class="card d-flex justify-content-between m-4 p-3" href="{{ route('Supervisor.unassignedTask', $task->getId() ) }}">
            <h4>{{$task->getTitle()}}</h4>
            <small><i>Created on - {{$task->getCreatedAt()}}</i></small>
        <a>
        @endforeach
@endsection