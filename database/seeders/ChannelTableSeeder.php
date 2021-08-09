<?php

namespace Database\Seeders;

use App\Models\Channel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ChannelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $channel1=
            
            [
            "name"=>"laravel",
            "slug"=>Str::slug("laravel")
            ];


            $channel2=
            
            [
            "name"=>"ebey",
            "slug"=>Str::slug("ebey")
            ];


            $channel3=
            
            [
            "name"=>"vue js",
            "slug"=>Str::slug("vue js")
            ];


            $channel4=
            
            [
            "name"=>"php ",
            "slug"=>Str::slug("php")
            ];
            Channel::create($channel1);
            Channel::create($channel2);
            Channel::create($channel3);
            Channel::create($channel4);
    }
}
