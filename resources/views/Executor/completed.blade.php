@extends('layouts.in-app')
@section('aside')
    <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>
    <a href="#" class="list-group-item list-group-item-action bg-light">Completed</a>
    <a href="{{ route('Executor.inprogress') }}" class="list-group-item list-group-item-action bg-light">In Progress</a>
    <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
    <a href="{{ route('choice') }}" class="list-group-item list-group-item-action bg-light">Switch Role</a>
@endsection
@section('content')
<div><h2>Completed</h2></div>
<div>
    @if($viewData['completedTasks']->count())
        @foreach($viewData['completedTasks'] as $task)
        <a class="p-2 mb-2 card" href="{{ route('Executor.selected', $task->getId()) }}" style="text-decoration:none;">
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