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
<h4 class="m-3">Sent-back Requests</h4>
<div>
    @if(count($sentBackRequests))
        @foreach($sentBackRequests as $request)
            <a class="p-2 m-3 card d-flex flex-row justify-content-between" href="#" style="text-decoration:none;">
                <div>
                    <p><i class="bi bi-search ml-4 mr-3"></i>Task : {{ $request->getTitle() }}</p>
                    <p><i class="bi bi-calendar-date ml-4 mr-3"></i>Date Created : {{ $request->getCreatedAt() }}</p>
                    <p><i class="bi bi-pen ml-4 mr-3"></i>Send-Back Reason : {{ $request->getSendBackReason() }}</p>
                </div>
                <div class="d-flex flex-row align-self-center gap-2">
                    <button id="{{ 'task'.$request->getId() }}" onclick="reassignRequest('{{ $request->getId() }}')" class="mb-1 btn btn-info text-white"><i class="bi bi-pencil"></i> Reassign Request</button>
                </div>
            </a>
        @endforeach
    @else
        <h5 class="text-center"><i class="bi bi-file-text mr-2"></i>No Requests sent-back yet!</h5>
    @endif
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
</div>
<script type="text/javascript">
    function reassignRequest(id){
        var url = `http://127.0.0.1:8000/supervisor/reassign?id=${id}`;
        $('#partial').load(url + " #reassignrequestform", function(){
            $("#mymodal").modal('show');
            $(".modal-title").text("Reassign Request");
            return false;
        });
    }

    function saveAssignee(){
        var form = new FormData(document.getElementById("reassignrequestform"));
        $.ajax({
            type: 'POST',
            url: "{{route('savenewAssignee')}}",
            data: form,
            processData: false,
            contentType: false,
            success: function(result){
                $("#mymodal").modal('hide');
                document.getElementById(`task${result.id}`).parentElement.parentElement.remove();
                toastr.info('Task has been reassigned!');
            },
            error: function(){
                toastr.error('Failed with errors');
            }
        })
    }
</script>
@endsection