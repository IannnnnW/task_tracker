@extends('layouts.in-app')
@section('aside')
    <a href="{{ route('Admin.index') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-tv"></i> Manage Users</a>
    <a href="{{ route('profile') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-person-gear"></i></i> Profile</a>
    <a href="{{ route('choice') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-toggles"></i> Switch Role</a>
@endsection 
@section('content')
<h3 class="m-3">Manage Users</h3>
<div class="m-3">
    <table id="UsersTable" class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th width="300px;">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $key=> $value)
                <tr>
                    <td>{{$value->name}}<td>
                    <div class="d-flex justify-content-center gap-5">
                        <button id="user{{$value->id}}" class="btn btn-danger" onclick="DeleteUser('{{$value->id}}')">Delete</button>
                        <button id="user{{$value->id}}" class="btn btn-primary" onclick="EditUser('{{$value->id}}')">Edit</button>
                    </div>
                <tr>
            @endforeach
        </tbody>
    <table/>
    {!! $users->links() !!}
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
    <script>
        function DeleteUser(id){
            var url = `http://127.0.0.1:8000/admin/deleteuser?id=${id}`;
            $('#partial').load(url + " #DeleteUserForm", function(){
                $("#mymodal").modal('show');
                $(".modal-title").text("Delete User");
                return false;
            });
        }
        function Remove(id){
            var user = new FormData(document.querySelector('#DeleteUserForm'));
            $.ajax({
                type: 'POST',
                url: "{{ route('removeuser') }}",
                data: user,
                processData: false,
                contentType: false,
                success: function(){
                    document.querySelector('#user'+id).parentElement.parentElement.parentElement.remove();
                    $("#mymodal").modal('hide');
                    toastr.info('User successfully deleted!')
                },
                error: function(){
                    toastr.error('User could not be deleted!')
                }
            })
        }
        function EditUser(id){
            var url = `http://127.0.0.1:8000/admin/edituser?id=${id}`;
            $('#partial').load(url + " #EditUserForm", function(){
                $("#mymodal").modal('show');
                $(".modal-title").text("Edit User");
                return false;
            });
        }
        function SaveUserEdit(){
            var user = new FormData(document.querySelector('#EditUserForm'));
            $.ajax({
                type: 'POST',
                url: "{{ route('saveuseredit') }}",
                data: user,
                processData: false,
                contentType: false,
                success: function(result){
                    toastr.info(`${result.name} successfully editted!`)
                },
                error: function(){
                    toastr.error("User couldn't be edited");
                }
            })
        }
    </script>
</div>
@endsection
