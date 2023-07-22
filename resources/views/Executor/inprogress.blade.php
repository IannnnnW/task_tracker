@extends('layouts.in-app')
@section('aside')
    <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>
    <a href="{{ route('Executor.completed') }}" class="list-group-item list-group-item-action bg-light">Completed</a>
    <a href="{{ route('Executor.inprogress') }}" class="list-group-item list-group-item-action bg-light">In Progress</a>
    <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
    <a href="{{ route('choice') }}" class="list-group-item list-group-item-action bg-light">Switch Role</a>
@endsection
@section('content')
<div><h2>In Progress</h2></div>
<div>
    @foreach($viewData['assignedTasks'] as $task)
        <a class="p-2 mb-2 card" href="{{ route('Executor.selected', $task->getId()) }}" style="text-decoration:none;">
            <p class=""><i class="bi bi-search ml-4 mr-3"></i>Task - {{$task->getTitle()}}</p>
            <p><i class="bi bi-clipboard2-data ml-4 mr-3"></i>Priority - {{$task->getPriority()}}</p>
            <p><i class="bi bi-calendar-date ml-4 mr-3"></i>Date Assigned - {{$task->getDateAssigned()}}</p>
        </a>
    @endforeach
</div>
@endsection