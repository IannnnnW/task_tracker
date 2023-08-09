@extends('layouts.in-app')
@section('aside')
    <a href="{{ route('Requestor.dashboard') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-clipboard"></i> Dashboard</a>
    <a href="{{ route('Requestor.addtask') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-plus-circle"></i> Add Task</a>
    <a href="{{ route('Requestor.pending') }}" class="list-group-item list-group-item-action bg-light d-flex"><i class="bi bi-clock mr-2"></i> In Progress and Unassigned</a>
    <a href="{{ route('Requestor.completedrequests') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-list-check"></i> Completed</a>
    <a href="{{ route('Requestor.closedrequests') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-collection"></i> Closed</a>
    <a href="{{ route('profile') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-person-gear"></i></i> Profile</a>
    <a href="{{ route('choice') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-toggles"></i> Switch Role</a>
@endsection 
@section('content')
<h4 class="m-3">Completed Requests</h4>
<div>
    @if(count($completedrequests))
        @foreach($completedrequests as $request)
            <a class="p-2 m-3 card d-flex flex-row justify-content-between" href="#" style="text-decoration:none;">
                <div>
                    <p><i class="bi bi-search ml-4 mr-3"></i>Task : {{$request->getTitle()}}</p>
                    <p><i class="bi bi-calendar-date ml-4 mr-3"></i>Date Created : {{$request->getCreatedAt()}}</p>
                    <p><i class="bi bi-check2-square ml-4 mr-3"></i>Date Completed : {{$request->getDateCompleted()}}</p>
                </div>
                <div class="d-flex flex-row align-self-center gap-2">
                    <button id="{{ 'task'.$request->getId() }}" onclick="markasClosed('{{ $request->getId() }}')" class="mb-1 btn btn-info text-white"><i class="bi bi-check-all"></i> Close Request</button>
                    <button class="btn btn-primary" onclick="viewDetails('{{ $request->getId() }}')"><i class="bi bi-eye"></i> View Details</button>
                    <button id="sendback" class="btn btn-secondary" onclick="sendBack('{{ $request->getId() }}')"><i class="bi bi-backspace-fill"></i> Send Back</button>
                </div>
            </a>
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
        @endforeach
    @else
        <h5 class="text-center"><i class="bi bi-file-text mr-2"></i>No Requests completed yet!</h5>
    @endif
</div>
<script class="text/javascript">
    function markasClosed(id){
        var csrf = document.querySelector('meta[name="csrf-token"]').content;
        $.ajax({
            type:'POST',
            url: "{{ route('markasclosed') }}",
            data: { '_token':csrf, 'id':id },
            success: function(result){
                document.querySelector(`#task${result.id}`).parentElement.parentElement.remove();
                toastr.success('Request Successfully Closed!');
            }
        })
    }
    function viewDetails(id){
        var url = `http://127.0.0.1:8000/requestor/showdetails?id=${id}`;
        $('#partial').load(url + " #detailsform", function(){
            $("#mymodal").modal('show');
            $(".modal-title").text("Task Details");
            return false;
        });
    }
    function sendBack(id){
        var url = `http://127.0.0.1:8000/requestor/sendback?id=${id}`;
        $('#partial').load(url + " #addsendbackcomment", function(){
            $("#mymodal").modal('show');
            $(".modal-title").text("Add Send Back Reason");
            return false;
        });
    }
    function saveReason(){
        var reason = new FormData(document.getElementById("addsendbackcomment"));
        $.ajax({
            type: 'POST',
            url: "{{ route('savesendbackreason') }}",
            data: reason,
            processData: false,
            contentType: false,
            success: function(result){
                $("#mymodal").modal('hide');
                toastr.info("Your request has been sent back");
            }
        });
    }
</script>
@endsection
