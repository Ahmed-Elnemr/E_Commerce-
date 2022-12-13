@extends('layouts.admin')


@section('content')

@if (session('message'))
<h3 class="alert alert-success">{{session('message')}}</h3>
@endif

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Category
                        <a href="{{route('category.create')}}" class="btn btn-primary btn-sm float-end">Add Category</a>
                    </h4>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
@endsection
