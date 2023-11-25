@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="float-start ">All Classes</h3>
                    <a href="{{ route('add.class') }}" class="btn btn-dark float-end">Add Class</a>
                </div>
                <div class="card-body">
                    @if(session()->has('success'))
                        <div class="alert alert-success">{{session()->get('success')}}</div>
                    @endif
                    @if(session()->has('dlt_success'))
                        <div class="alert alert-success">{{session()->get('dlt_success')}}</div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>S.L</th>
                                <th>Class Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($classes as $key => $row)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$row->class_name}}</td>
                                    <td>
                                        <a href="{{route('classes.edit',$row->id)}}" class="btn btn-dark float-start">Edit</a>
                                        <form action="{{route('classes.delete')}}" method="post">
                                            @csrf
                                            <input type="hidden" value="{{$row->id}}" name="hidden_id">
                                            <input type="submit" value="Delete" class="btn btn-danger">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-3"></div>
    </div>
@endsection
