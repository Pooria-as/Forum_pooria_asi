@extends("layouts.app")
@section("content")


<div class="card">
    <div class="card-header">
        <h4>
            New Notifications
        </h4>
    </div>
    <div class="card-body">
        <ul class="list-group">
            @foreach ($notifications as $notification)
          
                 <li class="list-group-item">
                  you have reply for you'r discussion <strong>{{$notification->data["discussion"]["title"]}}</strong>
                  <a href="{{route("Discussion.show",$notification->data["discussion"]["slug"])}}" class="btn btn-outline-primary float-right">Show Reply</a>
                 </li>
                  
            @endforeach
        </ul>
    </div>
</div>


@endsection