<form id="addsendbackcomment" method="POST" action="javascript:void(0)" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ Crypt::encrypt($task->getId()) }}"/>
    <input type="hidden" id="task_id" name="task_id" value="{{$task->getId()}}"/>
    <input type="hidden" name="executor" value="{{$task->getAssignedTo()->name}}"/>
    <div class="d-flex flex-column">
        <label>Add Comment : </label>
        <textarea name="reason" id="comment" rows="4"></textarea>
    </div>
    <div class="modal-footer">
    <input type="button" class="btn btn-secondary" id="saveSendBackReason" value="Add" onclick="saveReason(); return false;" name="saveSendBackReason"/>
    </div>
</form>