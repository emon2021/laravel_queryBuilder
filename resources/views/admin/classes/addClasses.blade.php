@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">Add Class</div>
                <div class="card-body">
                    @if(session()->has('success'))
                        <div class="alert alert-success">{{session()->get('success')}}</div>
                    @endif
                    @if(session()->has('exist'))
                        <div class="alert alert-danger">{{session()->get('exist')}}</div>
                    @endif
                    <form action="{{route('store.class')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="forClassName">Class Name</label>
                            <input type="text" name="class_name" @error('class_name') is-invalid @enderror placeholder="Enter Class Name" id="" class="form-control">
                            @error('class_name')
                                <div class="alert alert-danger">This field is required!</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Add" class="btn btn-dark">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4"></div>
    </div>
@endsection