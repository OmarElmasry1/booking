@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Users</h4> </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody> @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <a href="{{ url('dashboard/user-delete/'.$user->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>        
    </div>


    <div class="card">
        <div class="card-header">
            <h4>Admins</h4> </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody> @foreach ($adminUser as $admin)
                    <tr>
                        <td>{{$admin->id}}</td>
                        <td>{{$admin->name}}</td>
                        <td>{{$admin->email}}</td>
                        <td>
                            <a href="{{ url('dashboard/user-delete/'.$user->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>        
    </div>
@endsection