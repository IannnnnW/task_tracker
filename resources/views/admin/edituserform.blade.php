<form id="EditUserForm" method="POST" action="javascript:void(0)" enctype="multipart/form-data">
    @csrf
    <div class="d-flex flex-column">
        <input name="userId" id="userId" value="{{$user->id}}" hidden/>
        <label>Name: </label>
        <input name="username" id="username" value="{{$user->name}}" />
        <label>Email: </label>
        <input name="email" id="email" value="{{$user->email}}" />
        <label>Department: </label>
        <select id="department" name="department" class="form-select">
            <option selected>{{$user->getDepartment()->name}}</option>
            @foreach($departments as $department)
                <option value="{{ $department->id }}">{{ $department->name }}</option>
            @endforeach
        </select>
        <label>Role: </label>
        <select id="role" name="role" class="form-select">
            <option selected>{{$user->getRole()->role}}</option>
            @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->role }}</option>
            @endforeach
        </select>
    </div>
    <div class="modal-footer">
    <input type="button" class="btn btn-secondary" id="saveSendBackReason" value="Save" onclick="SaveUserEdit(); return false;" name="saveSendBackReason"/>
    </div>
</form>