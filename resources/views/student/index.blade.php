@extends('layouts.master')
@section('title','index')

@section('content')
    <div class="container mt-5 border">
        <div class="d-flex">
            <h2>Student Data</h2>
            <a href="{{route('student.create')}}" class="btn btn-success ms-auto">Add New</a>
        </div>

    @if(session('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Congratulation!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
        <div class="row">
            <div class="col-md-6 offset-3">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $s)
                            <tr>
                                <td>{{$s->id}}</td>
                                <td>{{$s->name}}</td>
                                <td>{{$s->email}}</td>
                                <td>{{$s->age}}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $s->image) }}" class="card-img-top w-50 rounded-circle" >
                                </td>
                                <td>
                                    <a href="{{route('student.show',['id'=>$s->id])}}" class="btn btn-dark">Show</a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
