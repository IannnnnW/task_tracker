@extends('layouts.app')
@section('content')
<div class="card mb-4" style="width:500px">
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
                <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Attachment</label>
                <div class="col-lg-10 col-mf-6 col-sm-12">
                    <input name="image"  value="{{ $viewData['unassignedTask']->getImage() }}" class="form-control" type="file" name="image" disabled></input>
                </div>
            </div>

            <div class="mb-3">
                <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Department</label>
                <select name="department_assigned_to" class="form-select" aria-label="Select Department" disabled>
                    <option selected>{{$viewData['unassignedTask']->getDepartmentAssignedTo()->getDepartmentName()}}</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Set Assignee</label>
                <select name="assigned_to">
                    @foreach($viewData['departmentMembers'] as $departmentMember)
                        <option value="{{ $departmentMember->getId() }}">{{$departmentMember->getName()}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Set Priority</label>
                <select name="priority">
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
@endsection