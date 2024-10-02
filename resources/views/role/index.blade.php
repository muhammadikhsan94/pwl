@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<div class="container py-5">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1>Data Role</h1>
            <a class="btn btn-primary" href="{{ url('role/create') }}">Create</a>
        </div>
        <div class="card-body">
            {{-- ISI KONTENT --}}
            <div class="table-responsive">
                <table class="table table-hover table-striped" style="width: 100% !important">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
