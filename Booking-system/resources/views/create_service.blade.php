
@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Add service</h4> 
        </div>
        <div class="card-body">
            <form action="{{ route('new_service')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group">
                    <div class="col-sm-10">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                </div>
                    <div class="form-group">
                    <div class="col-sm-10">
                        <label>price</label>
                        <input type="text" class="form-control" name="price">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <label>description</label>
                        <input type="text" class="form-control" name="description">
                    </div>
                </div>
               
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </div>
            </form>
            </div>        
    </div>
@endsection
