<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    protected $fillable=["channel_id","user_id","title","content","slug"];

public function author()
{
    return $this->belongsTo(User::class,"user_id");
}








    public function getRouteKeyName()
    {
        return "slug";
    }



    public function MarkAsBestReply(Reply $Reply)
    {
         $this->update([
            "reply_id"=>$Reply->id
         ]);
    }

  
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

}
