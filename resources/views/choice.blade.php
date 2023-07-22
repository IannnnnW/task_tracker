@extends('layouts.app')
@section('content')
@if($viewData['user']->role->getRole() == 'admin')
<h1 class="text-center mb-4">Welcome Admin!</h1>
<h2 class="text-center">Select Role</h2>
<div class="d-flex justify-content-center mt-4">
    <div class="container d-flex flex-column">
        <div class="col-md-6 col-lg-4 mb-2 align-self-center d-flex flex-column align-items-center">
            <img src="{{asset('/img/admin.png')}}" class="img-fluid rounded">
            <a class="mt-2 text-center text-white btn bg-secondary">Admin</a>
        </div>
        <div class="col-md-6 col-lg-4 mb-2 align-self-center d-flex flex-column align-items-center">
            <img src="{{asset('/img/executor.png')}}" class="img-fluid rounded">
            <a class="mt-2 text-center text-white btn bg-secondary">Execute</a>
        </div>
        <div class="col-md-6 col-lg-4 mb-2 align-self-center d-flex flex-column align-items-center">
            <img src="{{asset('/img/requestor.png')}}" class="img-fluid rounded">
            <a href="{{ route('Requestor.index') }}"class="mt-2 text-center text-white btn bg-secondary">Request</a>
        </div>
    </div>
</div>
@elseif($viewData['user']->role->getRole() == 'supervisor')
<h1 class="text-center mb-4">Welcome Supervisor!</h1>
<h2 class="text-center">Select Role</h2>
<div class="d-flex justify-content-center mt-4 margin-auto">
    <div class="container d-flex">
        <div class="col-md-6 col-lg-4 mb-2 align-self-center d-flex flex-column align-items-center">
            <img src="{{asset('/img/supervisor.png')}}" class="">
            <a class="text-center btn" href="{{ route('Supervisor.index') }}">Supervise</a>
        </div>
        <div class="col-md-6 col-lg-4 mb-2 align-self-center d-flex flex-column align-items-center">
            <img src="{{asset('/img/executor.png')}}" class="img-fluid rounded">
            <a class="text-center btn">Execute</a>
        </div>
        <div class="col-md-6 col-lg-4 mb-2 align-self-center d-flex flex-column align-items-center">
            <img src="{{asset('/img/requestor.png')}}" class="img-fluid rounded">
            <a href="{{ route('Requestor.index') }}" class="text-center btn">Request</a>
        </div>
    </div>
</div>
@else
<h1 class="text-center mb-4">Welcome User!</h1>
<h2 class="text-center">Select Role</h2>
<div class="justify-content-center mt-4 margin-auto">
    <div class="container d-flex justify-content-between">
        <div class="col-md-6 col-lg-4 mb-2 align-self-center d-flex flex-column align-items-center">
            <img src="{{ asset('/img/executor.png') }}" class="img-fluid rounded">
            <a href="{{ route('Executor.inprogress') }}"class="text-center btn">Execute</a>
        </div>
        <div class="col-md-6 col-lg-4 mb-2 align-self-center d-flex flex-column align-items-center">
            <img src="{{asset('/img/requestor.png')}}" class="img-fluid rounded">
            <a href="{{ route('Requestor.index') }}" class="text-center btn">Request</a>
        </div>
    </div>
</div>
@endif
@endsection