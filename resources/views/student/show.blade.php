@extends('layouts.master')
@section('title','show')

@section('content')
    <div class="container mt-5 border">
        <div class="d-flex">
            <h2>Student Data</h2>
            <a href="{{route('student.index')}}" class="btn btn-success ms-auto">Back</a>
        </div>
    <div class="row">
        <div class="col-md-6 offset-3">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>{{$student->name}}</td>
                        <td>{{$student->email}}</td>
                        <td>{{$student->age}}</td>

                        <td>
                            <img src="{{ asset('storage/' . $student->image) }}" class="card-img-top w-50 rounded-circle" >
                        </td>
                        </td>
                        <td class="d-flex">
                            <a href="{{route('student.edit',['id'=>$student->id])}}" class="btn btn-primary">Edit</a>
                            <a href="{{route('student.destroy',['id'=>$student->id])}}" class="btn btn-danger">Delete</a>

                        </td>

                    </tr>

                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
