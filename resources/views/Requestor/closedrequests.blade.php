@extends('layouts.in-app')
@section('aside')
    <a href="{{ route('Requestor.dashboard') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-clipboard"></i> Dashboard</a>
    <a href="{{ route('Requestor.addtask') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-plus-circle"></i> Add Task</a>
    <a href="{{ route('Requestor.pending') }}" class="list-group-item list-group-item-action bg-light d-flex"><i class="bi bi-clock mr-2"></i> In Progress and Unassigned</a>
    <a href="{{ route('Requestor.completedrequests') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-list-check"></i> Completed</a>
    <a href="{{ route('Requestor.closedrequests') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-collection"></i> Closed</a>
    <a href="{{ route('profile') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-person-gear"></i></i> Profile</a>
    <a href="{{ route('choice') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-toggles"></i> Switch Role</a>
@endsection 
@section('content')
<h4 class="m-2">{{$viewData['title']}}</h4>
    @if(count($viewData['closedRequests']))
        @foreach($viewData['closedRequests'] as $request)
            <a class="card p-2 mb-2" style="text-decoration:none;">
                <p>Title - {{$request->getTitle()}}</p>
                <p>Date Closed - {{$request->getDateClosed()}}</p>
            </a>
        @endforeach
    @else
        <h5 class="text-center"><i class="bi bi-file-text mr-2"></i> You haven't closed any requests yet!</h5>
    @endif
@endsection