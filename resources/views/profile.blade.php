@extends('layouts.in-app')
@section('aside')
    <a href="{{ route('profile') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-person-gear"></i></i> Profile</a>
    <a href="{{ route('choice') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-toggles"></i> Switch Role</a>
@endsection 
@section('content')
<div class="d-flex justify-content-center m-5">
    <div class="card d-flex justify-content-center align-items-center" style="width:300px;">
        <img src="{{asset('/img/person-circle.svg')}}"/>
        <h6 class="text-center">{{$viewData['user']->getName()}}</h6>
        <h6 class="text-center">{{$viewData['user']->getDepartment()->name}}</h6>
        <h6 class="text-center">{{$viewData['user']->getRole()->role}}</h6>
        <h6 class="text-center">{{$viewData['user']->getEmail()}}</h6>
    </div>
</div>
@endsection
