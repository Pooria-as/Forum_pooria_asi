@extends("layouts.app")

@section("content")

<div class="card m-2">
    <div class="card-header">
        {{$Discussion->title}}
    </div>
    <div class="card-body">
        <p>
            {!!$Discussion->content!!}
        </p>
    </div>
    <br>    
    @if ($Discussion->reply_id !=null)
        <div class="card m-3">
            @php
            $relatedReply=  DB::table('replies')->where("replies.id",$Discussion->reply_id)->first();
          @endphp
            <div class="card-header bg-success">
                <img src="{{Gravatar::src($relatedReply->user_id)}}" class="img img-thumbnail rounded-circle" width="30" alt="">

               <h6 class="text text-white">
                Best Reply
               </h6>
            </div>
           
           
            <div class="card-body">
           <p>
            {!! $relatedReply->content !!}  
           </p>

            </div>
        </div>
    @endif
</div>








@foreach ($Discussion->replies as $item)
  <div class="card m-2">
      <div class="card-header">
          <img src="{{Gravatar::src($item->owner->email)}}" class="img img-thumbnail rounded-circle" width="30" alt="">
          {{$item->name}}
        @if (auth()->user()->id == $Discussion->user_id)
        <div class="float-right">
            <form action="{{route("Disscussion.best.reply",$Discussion->slug)}}" method="POST">
          @csrf
                <input type="hidden" name="reply_id" value="{{$item->id}}">
          
          
          <button type="submit" class="btn btn-primary">
              Mark as Best 
          </button>
          </form>    
            </div>
        @endif

















      </div>
      <div class="card-body">
          {!!$item->content!!}
      </div>
  </div>
@endforeach

<div class="card m-2">
    <div class="card-header">
        Add Reply
    </div>
    <div class="card-body">
        <form action="{{route("Reply.store",$Discussion->slug)}}" method="POST">
            @csrf
            <div class="form-group">
                <input id="x" type="hidden" name="content">
                <trix-editor input="x"></trix-editor>
                <br>
              
                @error("content")
                    <span class="badge badge-danger">
                        {{$message}}
                    </span>
                @enderror
            </div>
            <button class="btn btn-outline-success btn-block" type="submit">Reply</button>
        </form>
    </div>
</div>

@endsection