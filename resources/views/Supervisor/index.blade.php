@extends('layouts.app')
@section('content')
<h1>Dashboard</h1>
<div class="container-fluid justify-content-center d-flex pt-5">
    <a class="card d-flex addNew justify-content-center align-items-center p-5" href="{{ route('Supervisor.assigned') }}">
        <h3 class="text-center">{{ $viewData['assignedBtn'] }}</h3>
        <h4 class="text-center">{{ $viewData['assignedNumber'] }}</h4>
    </a>
    <div class="m-3"></div>
    <a class="card d-flex addNew justify-content-center align-items-center p-5" href="{{ route('Supervisor.unassigned') }}">
        <h3 class="text-center">{{$viewData['unassignedBtn']}}</h3>
        <h4 class="text-center">{{$viewData['unassignedNumber']}}</h4>
    </a>
</div>
@endsection