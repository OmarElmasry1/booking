@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Services</h4> </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>price</th>
                        <th>description</th>
                    </tr>
                </thead>
                <tbody> @foreach ($services as $service)
                    <tr>
                        <td>{{$service->id}}</td>
                        <td>{{$service->name}}</td>
                        <td>{{$service->price}}</td>
                        <td>{{$service->description}}</td>
                        <td>
                            <a href="{{ url('dashboard/service-delete/'.$service->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>        
    </div>


@endsection