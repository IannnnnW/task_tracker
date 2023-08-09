@extends('layouts.in-app')
@section('aside')
    <a href="#" class="list-group-item list-group-item-action bg-light"><i class="bi bi-clipboard"></i> Dashboard</a>
    <a href="{{ route('Executor.completed') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-list-check"></i> Completed & Closed</a>
    <a href="{{ route('Executor.inprogress') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-clock mr-2"></i> Assigned</a>
    <a href="{{ route('profile') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-person-gear"></i> Profile</a>
    <a href="{{ route('choice') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-toggles"></i> Switch Role</a>
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
            <input type="hidden" id="task_id" value="{{$viewData['task']->getId()}}">
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
                <img src="{{url('storage/images'.$viewData['task']->getImage()) }}">
            </div>
        @else
            <div class="mb-3">
                No Attachments
            </div>
        @endif
        <div id="task-comments" class="m-3">
            @if(count($viewData['executorComments']))
                <h5 class="text-center">Comments</h5>
                @foreach($viewData['executorComments'] as $comment)
                    <div class="card p-1 mb-2">
                        <p>{{$comment}}</p>
                        <small class="align-self-end"> - {{$viewData['task']->getAssignedTo()->name}}</small>
                    </div>
                @endforeach   
            @else
                <h5 id="nocomment" class="text-center">No Comments Yet!</h5>
            @endif
        </div>
        <div class="d-flex justify-content-between">
            <button class="btn btn-success" onclick="markAsComplete()">Mark as Complete <i class="bi bi-check-circle ml-2"></i></button>
            <button type="button" class="btn btn-primary" onclick='addcomment("{{ $viewData["task"]->getId() }}")' >Add Comment <i class="bi bi-card-text ml-2"></i></button>
        </div>
        <!-- Modal -->
        <div class="modal fade in" id="mymodal" data-keyboard="false" tabindex="-1" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="partial" class="modal-body"></div>
                </div>
            </div>
        </div>
    </form>
</div>
<script class="text/javascript">
    function addcomment(id){
        var url = `http://127.0.0.1:8000/executor/addcomment?id=${id}`;
        $('#partial').load(url + " #addform", function(){
            $("#mymodal").modal('show');
            $(".modal-title").text("Add Comment");
            return false;
        });
    }
    function SaveComment(){
        var formedit = new FormData(document.getElementById("addform"));
        var task_id = $("#task_id").val();
        $.ajax({
            type: 'POST',
            url: "{{route('savecomment')}}",
            data: formedit,
            processData: false,
            contentType: false,
            success: function(result){
                $("#mymodal").modal('hide');
                var markup = `
                <div class="card p-1 mb-2">
                    <p>${JSON.parse(result['subtasks'])['{{ $viewData['task']->getAssignedTo()->name }}'][JSON.parse(result['subtasks'])['{{ $viewData['task']->getAssignedTo()->name }}'].length - 1]}</p>
                    <small class="align-self-end"> - {{ $viewData['task']->getAssignedTo()->name }}</small>
                </div>
                `;
                $("#task-comments").append(markup);
            },
            error: function(){}
        });
    }

    function markAsComplete(){
        var task_id = $("#task_id").val();
        var csrf = document.querySelector('meta[name="csrf-token"]').content;
        $.ajax({
            type: 'POST',
            url: "{{route('markascomplete')}}",
            data: {'_token':csrf, 'id':task_id},
            success: function(){

            }
        })
    }
</script>
@endsection