@extends('layouts.app')
@section('content')
@if($viewData['user']->role->getRole() == 'admin')
<h1 class="text-center mb-4">Welcome Admin!</h1>
<h2 class="text-center">Select Role</h2>
<div class="d-flex justify-content-center mt-4">
    <div class="container d-flex flex-column align-content-between" style="height:750px;">
        <a class="card mb-3 p-3 align-self-center d-flex flex-column align-items-center" style="width:300px;text-decoration:none;">
            <img src="{{asset('/img/admin.png')}}" class="img-fluid rounded">
            <p class="mt-2 text-center text-black btn">Admin</p>
        </a>
        <a href="{{ route('Executor.inprogress') }}" class="card mb-3 p-3 align-self-center d-flex flex-column align-items-center"style="width:300px;text-decoration:none;">
            <img src="{{asset('/img/executor.png')}}" class="img-fluid rounded">
            <p class="mt-2 text-center btn">Execute</p>
        </a>
        <a href="{{ route('Requestor.addtask') }}"class="p-3 card align-self-center d-flex flex-column align-items-center" style="width:300px;text-decoration:none;">
            <img src="{{asset('/img/requestor.png')}}" class="img-fluid rounded">
            <p class="text-center text-black">Request</p>
        </a>
    </div>
</div>
@elseif($viewData['user']->role->getRole() == 'supervisor')
<h1 class="text-center mb-4">Welcome Supervisor!</h1>
<h2 class="text-center">Select Role</h2>
<div class="d-flex justify-content-center mt-4 margin-auto">
    <div class="container d-flex flex-column align-content-between" style="height:750px;">
        <a href="{{ route('Supervisor.unassigned') }}" class="card mb-3 p-3 align-self-center d-flex flex-column align-items-center" style="width:300px;text-decoration:none;">
            <img src="{{asset('/img/supervisor.png')}}" class="">
            <p class="text-center btn">Supervise</p>
        </a>
        <a href="{{ route('Executor.inprogress') }}" class="card mb-3 p-3 align-self-center d-flex flex-column align-items-center"style="width:300px;text-decoration:none;">
            <img src="{{asset('/img/executor.png')}}" class="img-fluid rounded">
            <p class="mt-2 text-center btn">Execute</p>
        </a>
        <a href="{{ route('Requestor.addtask') }}"class="p-3 card align-self-center d-flex flex-column align-items-center" style="width:300px;text-decoration:none;">
            <img src="{{asset('/img/requestor.png')}}" class="img-fluid rounded">
            <p class="text-center text-black">Request</p>
        </a>
    </div>
</div>
@else
<h1 class="text-center mb-4">Welcome User!</h1>
<h2 class="text-center">Select Role</h2>
<div class="d-flex justify-content-center mt-4 margin-auto">
    <div class="container d-flex flex-column justify-content-between">
        <a href="{{ route('Executor.inprogress') }}" class="card mb-3 p-3 align-self-center d-flex flex-column align-items-center" style="width:300px;text-decoration:none;">
            <img src="{{ asset('/img/executor.png') }}" class="img-fluid rounded">
            <p class="text-center btn">Execute</p>
        </a>
        <a href="{{ route('Requestor.addtask') }}" class="card mb-3 p-3 align-self-center d-flex flex-column align-items-center" style="width:300px;text-decoration:none;">
            <img src="{{asset('/img/requestor.png')}}" class="img-fluid rounded">
            <p class="text-center btn">Request</p>
        </a>
    </div>
</div>
@endif
@endsection