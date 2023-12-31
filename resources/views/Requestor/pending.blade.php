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
<h3 class="text-left align-self-start m-3">Unassigned, In progress & Sent Back</h3>
@if(count($viewData['pendingTasks']))
    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Progress</th>
                <th scope="col">Comments</th>
                <th scope="col">Options</th>           
            </tr>
        </thead>
        <tbody>
            @foreach($viewData['pendingTasks'] as $task)
            <tr>
                <td>{{ $task->getTitle() }}</td>
                <td>{{ $task->getProgress() }}</td>
                <td id="comments">
                    @if($task['subtasks'])
                        @for($i = 0; $i < count(json_decode(array($task['subtasks'])[0], true)[$task->getAssignedTo()->name]); $i++)
                            <p>{{$task->getAssignedTo()->name}}: {{ json_decode(array($task['subtasks'])[0], true)[$task->getAssignedTo()->name][$i] }}</p>
                        @endfor
                    @else
                        <p>No Comments Yet!</p>
                    @endif
                </td>
                @if($task->getProgress() == "in progress" || $task->getProgress() == 'sent back')
                    <td class="d-flex justify-content-between">
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#{{ 'task-'.$task->getId() }}"><i class="bi bi-eye m-1"></i></button>
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
                                                <input type="text" value="{{ $task->getDateAssigned() }}"class="form-control" id="dateAssigned" readonly>
                                            </div>
                                            <div class="form-group m-3">
                                                <label for="date" class="mb-2">Date Created</label>
                                                <input type="text" value="{{ $task->getCreatedAt() }}"class="form-control" id="dateAssigned" readonly>
                                            </div>
                                            @if($task->getProgress() == 'sent back')
                                                <div class="form-group m-3">
                                                    <label for="date" class="mb-2">Send Back Reason</label>
                                                    <textarea type="text"class="form-control" id="sendbackreason" readonly>{{ $task->getSendBackReason() }}</textarea>
                                                </div>
                                            @endif
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                @else
                    <td class="d-flex justify-content-between">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                            <i class="bi-trash"></i>
                        </button>
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Delete Request</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this request?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('Requestor.pending.delete', $task->getId() ) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger text-white">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-primary" href="{{ route('Requestor.pending.edit', $task->getId()) }}">
                            <i class="bi-pencil"></i>
                        </a>
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#unassigned"><i class="bi bi-eye m-1"></i></button>
                        <div class="modal fade" id="unassigned" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Task Details</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group m-3">
                                            <label for="name" class="mb-2">Title</label>
                                            <input type="text" value="{{ $task->getTitle() }}"class="form-control" id="supervisorName" aria-describedby="emailHelp"readonly>
                                            <small id="emailHelp" class="form-text text-muted"></small>
                                        </div>
                                        <div class="form-group m-3">
                                            <label for="name" class="mb-2">Message</label>
                                            <input type="text" value="{{ $task->getMessage() }}"class="form-control" id="assigneeName" readonly>
                                        </div>
                                        <div class="form-group m-3">
                                            <label for="date" class="mb-2">Department Assigned To</label>
                                            <input type="text" value="{{ $task->getDepartmentAssignedTo()->name }}"class="form-control" id="dateAssigned">
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
                @endif
            </tr>  
            @endforeach
        </tbody> 
    </table>
@else
    <h4 class="text-center"><i class="bi bi-card-checklist"></i> You haven't created any new requests recently!</h4>
@endif
@endsection