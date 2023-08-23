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
<div class="d-flex justify-content-center align-items-center">
    <div class="task-card card m-3" style="width:750px">
        <div class="card-header">
            Task Details
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('Supervisor.save', $viewData['unassignedTask']->getId() ) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="text" class="form-label">Task Name</label>
                    <input name="title" value="{{ $viewData['unassignedTask']->getTitle() }}" type="text" class="form-control" id="TaskTitle" aria-describedby="TaskTitle" disabled>
                </div>
                <div class="mb-3">
                    <label for="text" class="form-label">Detailed Description</label>
                    <textarea name="message" class="form-control" id="" rows="3" disabled>{{ $viewData['unassignedTask']->getMessage() }}</textarea>        
                </div>
                <div class="mb-3">
                    <label class="col-form-label">Attachment</label>
                    <div class="col-lg-10 col-mf-6 col-sm-12">
                        <input name="image"  value="{{ $viewData['unassignedTask']->getImage() }}" class="form-control" type="file" name="image" disabled></input>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="text" class="form-label">Created By</label>
                    <input name="title" value="{{ $viewData['unassignedTask']->getCreatedBy()->name }}" type="text" class="form-control" id="TaskTitle" aria-describedby="TaskTitle" disabled>
                </div>
                <div class="mb-3">
                    <label class="col-form-label">Department From</label>
                    <select name="department_from" class="form-select" disabled>
                        <option selected>{{$viewData['unassignedTask']->getCreatedBy()->getDepartment()->name}}</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="col-form-label">Set Assignee</label>
                    <select name="assigned_to" class="form-select">
                        @foreach($viewData['departmentMembers'] as $departmentMember)
                            <option value="{{ $departmentMember->getId() }}">{{$departmentMember->getName()}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="col-form-label">Set Priority</label>
                    <select name="priority" class="form-select">
                        <option selected>Set Priority</option>
                        <option value="very high">Very High</option>
                        <option value="high">High</option>
                        <option value="medium">Medium</option>
                        <option value="low">Low</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection