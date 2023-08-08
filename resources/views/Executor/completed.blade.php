@extends('layouts.in-app')
@section('aside')
    <a href="{{ route('Executor.dashboard')}}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-clipboard"></i> Dashboard</a>
    <a href="{{ route('Executor.completed') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-list-check"></i> Completed & Closed</a>
    <a href="{{ route('Executor.inprogress') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-clock mr-2"></i> Assigned </a>
    <a href="{{ route('profile') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-person-gear"></i> Profile</a>
    <a href="{{ route('choice') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-toggles"></i> Switch Role</a>
@endsection
@section('content')
<div><h2 class="m-3">Completed & Closed</h2></div>
<div>
    @if($viewData['completedTasks']->count())
        @foreach($viewData['completedTasks'] as $task)
        <a class="p-2 m-3 card" href="#" style="text-decoration:none;">
            <p class=""><i class="bi bi-search ml-4 mr-3"></i>Task - {{$task->getTitle()}}</p>
            <p><i class="bi bi-clipboard2-data ml-4 mr-3"></i>Priority - {{$task->getPriority()}}</p>
            <p><i class="bi bi-calendar-date ml-4 mr-3"></i>Date Assigned - {{$task->getDateAssigned()}}</p>
        </a>
        @endforeach
    @else
        <h5 class="text-center"><i class="bi bi-file-text mr-2"></i>No Completed task yet</h5>
    @endif
</div>
@endsection