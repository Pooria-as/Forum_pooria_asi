@extends("layouts.app")

@section("content")

<a href="{{route("Discussion.create")}}" class="btn btn-success">New Discussion</a>
@foreach ($Disucssions as $Disucssion)
    
<div class="card m-2">
    <div class="card-header">
    
        <strong>
        <img src="{{ Gravatar::src($Disucssion->email) }}" width="40" class="img img-thumbnail rounded-circle">
        {{$Disucssion->name}}

        </strong>
        <a href="{{route("Discussion.show",$Disucssion->slug)}}" class="btn btn-info float-right btn-sm">View</a>
    </div>
    <div class="card-body">
        <p>
            {{$Disucssion->title}}
        </p>
    </div>
</div>
@endforeach

@endsection