@extends('layouts.app')

@section('title', 'Module Users')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <h1> <i class="fas fa-users"></i> Module Users</h1>
                <hr>
                <a href="" class="btn btn-success"> 
                    <i class="fas fa-plus"></i> Add Users 
                </a>
                <br><br>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Fullname</th>
                            <th class="d-none d-md-table-cell">Email</th>
                            <th>Photo</th>
                            <th class="d-none d-md-table-cell">Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->fullname }}</td>
                                <td class="d-none d-md-table-cell">{{ $user->email }}</td>
                                <td><img src="{{ asset($user->photo) }}" width="36px"></td>
                                <td class="d-none d-md-table-cell">{{ $user->role }}</td>
                                <td>
                                    <a href="" class="btn btn-sm btn-larapp">
                                        <i class="fas fa-search"></i>
                                    </a>
                                    <a href="" class="btn btn-sm btn-larapp">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <a href="" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection