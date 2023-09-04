@extends('layouts.master')
@section('title','home')

@section('content')
    <div class="container mt-5">
        <h2>Submit Your Data</h2>
        <div class="row">
            <div class="col-md-6 offset-3">
                <form action="{{route('student.update',['id'=>$student->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Name:</label>
                        <input type="text" value="{{$student->name }}" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter name">

                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Email:</label>
                        <input type="email" value="{{ $student->email }}" class="form-control @error('email') is-invalid @enderror"  name="email" placeholder="Enter email"></input>

                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Age:</label>
                        <input type="number" value="{{ $student->age }}" class="form-control @error('age') is-invalid @enderror"  name="age" placeholder="Enter age"></input>

                        @error('age')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="img">Image:</label>
                        <input type="file" value="{{ old('image') }}" class="form-control @error('image') is-invalid @enderror"  name="image" placeholder="Enter age"></input>

                        @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
