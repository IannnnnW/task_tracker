<form id="DeleteUserForm" method="POST" action="javascript:void(0)" enctype="multipart/form-data">
    @csrf
    <input type="hidden" id="taskId" name="userId" value="{{ $user->getId() }}"/>
    <p>Are you sure you want you delete this user? </p>
    <div class="d-flex flex-row-reverse">
        <input type="button" class="btn btn-danger" id="RemoveUser" value="Yes, Delete" onclick="Remove('{{$user->id}}'); return false;" name="RemoveUser"/>
    </div>
    </div>
</form>