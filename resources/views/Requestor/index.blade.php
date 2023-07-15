@extends('layouts.app')
@section('content')
<h1>DashBoard</h1>
<div class="container-fluid justify-content-center d-flex pt-5">
    <a class="card d-flex addNew justify-content-center align-items-center" href="{{ route('Requestor.addtask') }}">
        <h3 class="text-center">{{$viewData['addButton']}}</h3>
        <i class="bi bi-plus-circle align-self-center"></i>
    </a>
    <div class="m-3"></div>
    <div class="d-flex flex-column" href="#">
        <a class="card mb-3 p-3">
            <h3 class="text-center">{{$viewData['completedButton']}}</h3>
            <i class="bi bi-check2-all align-self-center"></i>
        </a>
        <a class="d-flex card p-5" href="{{ route('Requestor.pending') }}">
            <div class="d-flex justify-content-between">
                <i class="bi bi-clock align-self-center"></i>
                <h3 class="m-2 text-center">{{$viewData['pendingButton']}}</h3>
            </div>
            <h4 class="text-center">{{$viewData['pendingNumber']}}</h4>
        </a>
    </div> 
</div>
@endsection