@extends('layouts.app')
@section('content')
<!-- <div class="card"style="witdth: 600px;">
    <div class="card-header">
        {{$viewData['title']}}
    </div>
    <div class="card-body"> -->
        <h3 class="text-left mb-2 align-self-start">Assiged Tasks</h3>
        <table class="table table-bordered table-striped mt-3">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Created By</th>
                    <th scope="col">Assignee</th>
                    <th scope="col">Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach($viewData['assignedTasks'] as $task)
                <tr>
                    <td>{{ $task->getId() }}</td>
                    <td>{{ $task->getTitle() }}</td>
                    <td>{{ $task->getCreatedBy()->name }}</td>
                    <td>{{ $task->getAssignedTo()->name }}</td>
                    <td>
                    <button class="btn bg-primary text-white" data-bs-toggle="modal" data-bs-target="#{{ 'task-'.$task->getId() }}"><i class="bi bi-eye m-1"></i>View Details</button>
                    <div class="modal fade" id="{{ 'task-'.$task->getId() }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Assignee Details</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="form-group m-3">
                                                <label for="name" class="mb-2">Supervisor</label>
                                                <input type="text" value="{{ $task->getSupervisedBy()->name }}"class="form-control" id="supervisorName" aria-describedby="emailHelp"readonly>
                                                <small id="emailHelp" class="form-text text-muted"></small>
                                            </div>
                                            <div class="form-group m-3">
                                                <label for="name" class="mb-2">Department</label>
                                                <input type="text" value="{{ $task->getDepartmentAssignedTo()->name }}"class="form-control" id="departmentName" aria-describedby="emailHelp"readonly>
                                                <small id="emailHelp" class="form-text text-muted"></small>
                                            </div>
                                            <div class="form-group m-3">
                                                <label for="name" class="mb-2">Assignee</label>
                                                <input type="text" value="{{ $task->getAssignedTo()->name }}"class="form-control" id="assigneeName" readonly>
                                            </div>
                                            <div class="form-group m-3">
                                                <label for="date" class="mb-2">Date Assigned</label>
                                                <input type="text" value="{{ $task->getDateAssigned() }}"class="form-control" id="dateAssigned">
                                            </div>
                                            <div class="form-group m-3">
                                                <label for="date" class="mb-2">Date Created</label>
                                                <input type="text" value="{{ $task->getCreatedAt() }}"class="form-control" id="dateAssigned">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        
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