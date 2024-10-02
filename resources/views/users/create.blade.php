@extends('layouts.app')
@section('title', 'Create Users')

@section('content')
<div class="container py-5">
    <h1>Create Users</h1>
    <form action="{{ url('/users/create') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" name="name" type="text" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input class="form-control" name="email" type="email" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input class="form-control" name="password" type="text" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection
