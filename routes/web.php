<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes(["verify"=>true]);

Route::prefix('Forum')->middleware(["auth","verified"])->group(function () {
Route::resource('Discussion', "DiscussionController");
Route::resource('Channel', "ChannelController");
Route::resource('Discussion/{Discussion}/Reply', "ReplyController");


Route::post('Discussion/{Discussion}/Reply/Mark-as-best', "DiscussionController@reply")->name('Disscussion.best.reply');

Route::get('all-notifications',"UserController@notification")->name("notifications");
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
