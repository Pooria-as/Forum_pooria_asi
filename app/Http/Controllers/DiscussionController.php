<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Disucssions=DB::table('discussions')
        ->join("users","discussions.user_id","users.id")
        ->select("*")
        ->get();
        return view("Discussion.index",compact("Disucssions"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view("Discussion.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>"required",
            "content"=>"required",
            
        ]);
        Discussion::create([
            "title"=>$request->title,
            "slug"=>Str::slug($request->title),
            "user_id"=>Auth::user()->id,
            "content"=>$request->content,
            "channel_id"=>$request->channel_id,
        ]);

        $noti=array("message"=>"Discussion Created Successfully","alert-type"=>"success");
        return redirect(route("Discussion.index"))->with($noti);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Discussion $Discussion)
    {
        

        // $Reply=DB::table('replies')
        // ->join("users","replies.user_id","users.id")
        // ->select("*")
        // ->where("discussion_id",$Discussion->id)->get();

        // dd($Reply->toArray());
        
        return view("Discussion.show",compact("Discussion"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function reply(Discussion $Discussion,Request $request)
    {   
        

        $Discussion->reply_id=$request->reply_id;
        $Discussion->save();
      
        $noti=array("message"=>"mark as best successfull","alert-type"=>"success");

        // $Discussion->update([
        //     "reply_id"=>$Reply->id
        // ])

        return back()->with($noti);
    }














   
}
