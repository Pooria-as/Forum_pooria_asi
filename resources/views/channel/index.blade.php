@extends("layouts.app")
@section("content")

@foreach ($relatedDiscussions as $item)

<div class="card m-2">
    <div class="card-header">
    
        <strong>
        <img src="{{ Gravatar::src($item->email) }}" width="40" class="img img-thumbnail rounded-circle">
        {{$item->name}}

        </strong>
        <a href="{{route("Discussion.show",$item->slug)}}" class="btn btn-info float-right btn-sm">View</a>
    </div>
    <div class="card-body">
        <p>
            {{$item->title}}
        </p>
    </div>
</div>
@endforeach

    




@endsection