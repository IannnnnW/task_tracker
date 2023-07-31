<form id="addform" method="POST" action="javascript:void(0)" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ Crypt::encrypt($task->getId()) }}"/>
    <input type="hidden" id="task_id" name="task_id" value="{{$task->getId()}}"/>
    <input type="hidden" name="executor" value="{{$task->getAssignedTo()->name}}"/>
    <div class="d-flex flex-column">
        <label>Add Comment : </label>
        <textarea name="comment" id="comment" rows="4"></textarea>
    </div>
    <div class="modal-footer">
    <input type="button" class="btn btn-secondary" id="savecomment" value="Add" onclick="SaveComment(); return false;" name="savecomment"/>
    </div>
</form>