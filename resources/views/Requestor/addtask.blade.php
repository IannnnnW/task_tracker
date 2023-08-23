@extends('layouts.in-app')
@section('aside')
    <a href="{{ route('Requestor.dashboard') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-clipboard"></i> Dashboard</a>
    <a href="{{ route('Requestor.addtask') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-plus-circle"></i> Add Task</a>
    <a href="{{ route('Requestor.pending') }}" class="list-group-item list-group-item-action bg-light d-flex"><i class="bi bi-clock mr-2"></i> In Progress, Unassigned and Sent Back</a>
    <a href="{{ route('Requestor.completedrequests') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-list-check"></i> Completed</a>
    <a href="{{ route('Requestor.closedrequests') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-collection"></i> Closed</a>
    <a href="{{ route('profile') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-person-gear"></i></i> Profile</a>
    <a href="{{ route('choice') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-toggles"></i> Switch Role</a>
@endsection 
@section('content')
<div class="d-flex justify-content-center align-items-center">
    <div class="card m-4 task-card">
        <div class="card-header">
        <h1 class="text-center">{{$viewData['title']}}</h1>
        </div>
        <div class='card-body'>
            @if($errors->any())
                <ul class="alert alert-danger list-unstyled">
                    @foreach($errors->all() as $error)
                    <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <div>
                <form method="POST" action="{{ route('Requestor.save') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="text" class="form-label">Task Name</label>
                        <input name="title" value="{{ old('title') }}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="text" class="form-label">Detailed Description</label>
                        <textarea name="message" value="{{ old('message') }}" class="form-control" id="" rows="3"></textarea>        
                    </div>
                    <div class="mb-3">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Attachment</label>
                        <div class="col-lg-10 col-mf-6 col-sm-12">
                            <input name="image"  value="{{ old('image') }}" class="form-control" type="file" name="image"></input>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Department</label>
                        <select name="department_assigned_to" class="form-select" aria-label="Select Department">
                            <option selected>-- Select Department --</option>
                            @foreach($viewData['departments'] as $department)
                                <option value="{{ $department->getId() }}">{{$department->getDepartmentName()}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection