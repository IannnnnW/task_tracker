@extends('layouts.app')
@section('content')
<!-- <div class="card"style="witdth: 600px;">
    <div class="card-header">
        Unassgined Tasks
    </div>
    <div class="card-body"> -->
        <h3 class="text-left mb-2 align-self-start">Pending Assignment</h3>
        <table class="table table-bordered table-striped mt-3">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Set Assignee</th>
                    <th scope="col">Option</th>
                </tr>
            </thead>
            <tbody>
                @foreach($viewData['unassignedTasks'] as $task)
                <tr>
                    <td>{{ $task->getId() }}</td>
                    <td>{{ $task->getTitle() }}</td>
                    <td>
                    <form method='POST' action="{{ route('Supervisor.save', $task->getId()) }}" class="d-flex" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <select name="assigned_to" class="form-select">
                            <option selected>Select Assignee</option>
                            @foreach($viewData['departmentMembers'] as $departmentMember)
                                <option value="{{ $departmentMember->getId() }}">{{$departmentMember->getName()}}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-success m-1">Assign</button>
                    </form>
                    </td>
                    <td>
                        <button class="bg-primary btn text-white" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="bi bi-eye m-1"></i>View Details</button>
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" width='400px'>
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Request Details</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="mb-3">
                                                <label for="text" class="form-label">Task Name</label>
                                                <input name="title" value="{{ $task->getTitle() }}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" disabled></input>
                                            </div>
                                            <div class="mb-3">
                                                <label for="text" class="form-label">Detailed Description</label>
                                                <textarea name="message" class="form-control" id="" rows="3"  disabled>{{ $task->getMessage() }}</textarea>        
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Attachment</label>
                                                <div class="col-lg-10 col-mf-6 col-sm-12">
                                                    <input name="image"  value="{{ $task->getImage() }}" class="form-control" type="file" name="image" disabled></input>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Department</label>
                                                <select name="department_assigned_to" class="form-select" aria-label="Select Department">
                                                    <option selected value="{{ $task['department_assigned_to'] }}">{{ $task->getDepartmentAssignedTo()->name }}</option>
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>  
                @endforeach
            </tbody> 
        </table>
    <!-- </div>
</div> -->
@endsection