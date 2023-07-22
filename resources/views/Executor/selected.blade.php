@extends('layouts.in-app')
@section('aside')
    <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>
    <a href="#" class="list-group-item list-group-item-action bg-light">Completed</a>
    <a href="#" class="list-group-item list-group-item-action bg-light">In Progress</a>
    <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
    <a href="{{ route('choice') }}" class="list-group-item list-group-item-action bg-light">Switch Role</a>
@endsection
@section('content')
<div class="card m-3 p-3">
    <form>
        <div class="mb-3">
            <label for="taskTitle" class="form-label">Title</label>
            <input type="text" value="{{ $viewData['task']->getTitle() }}"class="form-control" id="taskTitle" aria-describedby="TaskTitle" readonly>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea style="display:block; width:100%">{{$viewData['task']->getMessage()}}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label" for="assignedTo">Created By</label>
            <input type="text" value="{{$viewData['task']->getCreatedBy()->name}}"class="form-control" id="createdBy" readonly>
        </div>
        <div class="mb-3">
            <label for="dateCreated" class="form-label">Date Created</label>
            <input type="text" value="{{ $viewData['task']->getCreatedAt() }}"class="form-control" id="dateCreated" readonly>
        </div>
        <div class="mb-3">
            <label for="dateAssigned" class="form-label">Date Assigned</label>
            <input type="text" value="{{ $viewData['task']->getDateAssigned() }}"class="form-control" id="dateAssigned" readonly>
        </div>
        <div class="mb-3">
            <label for="priority" class="form-label">Priority</label>
            <input type="text" value="{{ $viewData['task']->getPriority() }}"class="form-control" id="priority" readonly>
        </div>
        @if($viewData['task']->getImage())
            <div class="mb-3">
                <label for="attachment" class="form-label">Attachment</label>
                <img src="{{url('storage/images'.$task->getImage())}}">
            </div>
        @else
            <div class="mb-3">
                No Attachments
            </div>
        @endif
        <div class="d-flex justify-content-between">
            <button class="btn btn-success">Mark as Complete<i class="bi bi-check-circle ml-2"></i></button>
            <button class="btn btn-primary">Add Comment<i class="bi bi-card-text ml-2"></i></button>
        </div>
    </form>
</div>
@endsection