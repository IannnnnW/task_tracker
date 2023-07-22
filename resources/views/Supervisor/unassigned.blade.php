@extends('layouts.app')
@section('content')
<h3 class="text-left mb-2 align-self-start">Pending Assignment</h3>
        @foreach($viewData['unassignedTasks'] as $task)
        <a class="card d-flex pendingAssignment justify-content-between" href="{{ route('Supervisor.unassignedTask', $task->getId() ) }}">
            <h4>{{$task->getTitle()}}</h4>
            <small><i>Created on - {{$task->getCreatedAt()}}</i></small>
        <a>
        @endforeach
@endsection