@extends("layouts.app")


@section("content")

<div class="card">
    <div class="card-header">
        <h6>
            New Discussion
        </h6>
    </div>
    <div class="card-body">
        <form action="{{route("Discussion.store")}}" method="POST">
            @csrf
            <div class="from-group">
                <label for="title"> Title</label>
                <input type="text" name="title" id="title" class="form-control">
                <br>
                @error("title")
                    <span class="badge badge-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="from-group">
                <label for="content">Content</label>
                <input id="x" type="hidden" name="content">
                 <trix-editor input="x"></trix-editor>
                @error("content")
               <span class="badge badge-danger">{{$message}}</span>
           @enderror
            </div>  

        <div class="form-group">
            <label for="channel_id"> Choose Channel</label>
            <select name="channel_id" id="channel_id" class="form-control">
                @foreach ($channels as $channel)
                       <option value="{{$channel->id}}">
                        {{$channel->name}}
                    </option> 
                @endforeach
            </select>
            <br>
            @error("channel_id")
            <span class="badge badge-danger">{{$message}}</span>
        @enderror
        </div>
        <div class="form-group">
                <button class="btn btn-success btn-block" type="submit">
                    Create Discussion
                </button>
        </div>
        </form>
    </div>
</div>













@endsection