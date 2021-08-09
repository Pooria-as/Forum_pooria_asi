@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{route("Discussion.create")}}" class="btn btn-success m-2">New Discussion</a>
    <div class="card"> 

        <div class="card-header">
            <h4>
                Dashboard
            </h4>
        </div>
        <div class="card-body">
            you'r log in
        </div>
    </div>
</div>
@endsection
