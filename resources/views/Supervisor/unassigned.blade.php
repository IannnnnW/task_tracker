@extends('layouts.in-app')
@section('aside')
    <a href="{{ route('Supervisor.index') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-clipboard"></i> Dashboard</a>
    <a href="{{ route('Supervisor.unassigned') }}" class="list-group-item list-group-item-action bg-light d-flex"><i class="bi bi-clock mr-2"></i> Unassigned</a>
    <a href="{{ route('Supervisor.assigned') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-plus-circle"></i> Assigned</a>
    <a href="{{ route('Supervisor.completedtasks') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-list-check"></i> Completed</a>
    <a href="{{ route('Supervisor.closed') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-collection"></i> Closed</a>
    <a href="{{ route('Supervisor.sentback') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-backspace-reverse"></i> Sent Back</a>
    <a href="{{ route('profile') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-person-gear"></i></i> Profile</a>
    <a href="{{ route('choice') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-toggles"></i> Switch Role</a>
@endsection
@section('content')
<h3 class="m-3">Pending Assignment</h3>
        @if(count($viewData['unassignedTasks']))
            @foreach($viewData['unassignedTasks'] as $task)
                <a class="card d-flex justify-content-between m-3 p-3" href="{{ route('Supervisor.unassignedTask', $task->getId() ) }}">
                    <h4>{{$task->getTitle()}}</h4>
                    <p>{{$task->getCreatedBy()->getDepartment()->name}}</p>
                    <small><i>Created on - {{$task->getCreatedAt()}}</i></small>
                <a>
            @endforeach
        @else
            <h5 class="text-center"><i class="bi bi-file-text mr-2"></i>No Tasks to Assign Yet!</h5>
        @endif
@endsection