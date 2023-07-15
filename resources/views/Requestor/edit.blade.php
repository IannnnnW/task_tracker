@extends('layouts.app')
@section('content')
<div class="card mb-4 task-card">
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
            <form method="POST" action="{{ route('Requestor.pending.save', $viewData['task']->getId()) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="text" class="form-label">Task Name</label>
                    <input name="title" value="{{ $viewData['task']->getTitle() }}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"></input>
                </div>
                <div class="mb-3">
                    <label for="text" class="form-label">Detailed Description</label>
                    <textarea name="message" class="form-control" id="" rows="3">{{ $viewData['task']->getMessage() }}</textarea>        
                </div>
                <div class="mb-3">
                    <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Attachment</label>
                    <div class="col-lg-10 col-mf-6 col-sm-12">
                        <input name="image"  value="{{ $viewData['task']->getImage() }}" class="form-control" type="file" name="image"></input>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Department</label>
                    <select name="department_assigned_to" class="form-select" aria-label="Select Department">
                        <option selected value="{{ $viewData['task']['department_assigned_to'] }}">{{ $viewData['task']->getDepartmentAssignedTo()->name }}</option>
                        @foreach($viewData['departments'] as $department)
                            <option value="{{ $department->getId() }}">{{ $department->getDepartmentName() }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection