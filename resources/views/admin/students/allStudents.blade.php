@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="float-start ">All Classes</h3>
                    <a href="{{ route('students.add') }}" class="btn btn-dark float-end">Add Student</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>S.L</th>
                                <th>Name</th>
                                <th>Class Name</th>
                                <th>Roll</th>
                                <th>Registration</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $key => $row)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$row->student_name}}</td>
                                    <td>{{$row->class_name}}</td>
                                    <td>{{$row->roll}}</td>
                                    <td>{{$row->registration}}</td>
                                    <td>{{$row->email}}</td>
                                    <td>
                                        <a href="#" class="btn btn-dark">Edit</a>
                                        <a href="#" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                    {{ $students->links() }}
                </div>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>
@endsection
