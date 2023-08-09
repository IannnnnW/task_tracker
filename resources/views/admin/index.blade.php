@extends('layouts.in-app')
@section('aside')
    <a href="{{ route('Admin.index') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-tv"></i> Manage Users</a>
    <a href="{{ route('profile') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-person-gear"></i></i> Profile</a>
    <a href="{{ route('choice') }}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-toggles"></i> Switch Role</a>
@endsection 
@section('content')
<h3 class="m-3">Manage Users</h3>
<div class="m-3">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th width="300px;">Action</td>
            </tr>
        </thead>
        <tbody>
            @if(!empty($users) && $users->count())
                @foreach($users as $key=> $value)
                    <tr>
                        <td>{{$value->name}}<td>
                        <button class="btn btn-danger">Delete</button>
                        <button class="btn btn-primary">Edit</button>
                    <tr>
                @endforeach
            @endif
        </tbody>
    <table/>
    {!! $users->links() !!}
</div>
@endsection
