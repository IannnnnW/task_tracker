@extends('layouts.in-app')
@section('aside')
    <a href="{{ route('Supervisor.index') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-clipboard"></i> Dashboard</a>
    <a href="{{ route('Supervisor.unassigned') }}" class="list-group-item list-group-item-action bg-light d-flex"><i class="bi bi-clock mr-2"></i> Unassigned</a>
    <a href="{{ route('Supervisor.assigned') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-plus-circle"></i> Assigned</a>
    <a href="{{ route('Supervisor.completedtasks') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-list-check"></i> Completed</a>
    <a href="{{ route('Supervisor.closed') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-collection"></i> Closed</a>
    <a href="{{ route('profile') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-person-gear"></i></i> Profile</a>
    <a href="{{ route('choice') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-toggles"></i> Switch Role</a>
@endsection
@section('content')
<h4 class="m-3">Closed Tasks</h4>
    @if(count($closedTasks))
        @foreach($closedTasks as $task)
            <div class="card m-3 p-1">
                <p>Title: {{$task->getTitle()}}</p>
                <p>Created: {{$task->getCreatedAt()}}</p>
                <p>Closed: {{$task->getDateClosed()}}</p>
            </div>
        @endforeach
    @endif
@endsection