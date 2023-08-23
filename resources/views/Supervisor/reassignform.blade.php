<form id="reassignrequestform" method="POST" action="javascript:void(0)" enctype="multipart/form-data">
    @csrf
    <input type="hidden" id="taskId" name="taskId" value="{{ $request->getId() }}"/>
    <label>Previous Assignee: </label>
    <input id="PreviousAssigneeName" name="PreviousAssigneeName" value="{{ $request->getAssignedTo()->name }}" disabled/>
    <label>Select New Assignee </label>
    <select id="newAssignee" name="newAssignee" class="form-select">
        <option selected>--- select ---</option>
        @foreach($departmentMembers as $member)
            <option value="{{ $member->id }}">{{ $member->name }}</option>
        @endforeach
    </select>
    <div class="modal-footer">
    <input type="button" class="btn btn-secondary" id="saveSendBackReason" value="Reassign" onclick="saveAssignee(); return false;" name="savenewAssignee"/>
    </div>
</form>