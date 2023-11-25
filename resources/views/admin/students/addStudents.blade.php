@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <div class="card">
                <h3 class="card-header">
                    Add Class
                </h3>
                <div class="card-body">
                    @if(session()->has('success'))
                        <div class="alert alert-success">{{session()->get('success')}}</div>
                    @endif
                    <form action="{{route('students.store')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="forName">Name:</label>
                            <input type="text" class="form-control" name="student_name" placeholder="Name:" id="">
                            
                        </div>
                        <div class="mb-3">
                            <label for="forName">Class:</label>
                            <select name="class_id" id="" class="form-select">
                                <option value="">Select Class</option>
                                @foreach($class_name as $row)
                                    <option value="{{$row->id}}">{{$row->class_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="forRoll">Roll:</label>
                            <input type="number" class="form-control" name="roll" placeholder="Roll:" id="">
                            
                        </div>
                        <div class="mb-3">
                            <label for="forRegistration">Registration:</label>
                            <input type="number" class="form-control" name="registration" placeholder="Registration:" id="">
                          
                        </div>
                        <div class="mb-3">
                            <label for="forEmail">Email:</label>
                            <input type="email" class="form-control" name="email" placeholder="Email:" id="">
                            
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Add" class="btn btn-dark">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-3"></div>
    </div>
@endsection