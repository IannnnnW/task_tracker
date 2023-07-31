@extends('layouts.in-app')
@section('aside')
    <a href="#" class="list-group-item list-group-item-action bg-light"><i class="bi bi-clipboard"></i> Dashboard</a>
    <a href="{{ route('Executor.completed') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-list-check"></i> Completed</a>
    <a href="{{ route('Executor.inprogress') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-clock mr-2"></i> In Progress (Assigned)</a>
    <a href="{{ route('profile') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-person-gear"></i> Profile</a>
    <a href="{{ route('choice') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-toggles"></i> Switch Role</a>
@endsection
@section('content')
<div class="m-3"><h2><i class="bi bi-bar-chart-line"></i> Assigned Tasks</h2></div>
<div class="m-3">
    @if(count($viewData['assignedTasks']))
        @foreach($viewData['assignedTasks'] as $task)
            <a class="p-2 mb-3 card" href="{{ route('Executor.selected', $task->getId()) }}" style="text-decoration:none;">
                <p><i class="bi bi-search ml-4 mr-3"></i>  Task : {{$task->getTitle()}}</p>
                <p><i class="bi bi-clipboard2-data ml-4 mr-3"></i>  Priority : {{$task->getPriority()}}</p>
                <p><i class="bi bi-calendar-date ml-4 mr-3"></i>  Date Assigned : {{$task->getDateAssigned()}}</p>
            </a>
        @endforeach
    @else
        <h5 class="text-center"><i class="bi bi-file-text mr-2"></i>You haven't been assigned any tasks yet.</h5>
    @endif
</div>
@endsection