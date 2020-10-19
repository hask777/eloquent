<?php

use App\Post;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/read', function(){

    // $posts = new Post([
    //     'title' => 'First title',
    //     'content' => "First contnet"
    // ]);
    // $posts->save();

    $posts = Post::all();

    foreach($posts as $post){
        return $post->title . '<br>' . $post->content;
    }
    
});

Route::get('/find', function(){

    $post = Post::find(1);
 
    return $post->title . '<br>' . $post->content;
     
});
