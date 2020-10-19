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

// Raw SQL Insert

Route::get('/insert', function(){
    DB::insert('insert into posts(title, content) values(?,?)', ['PHP with Laravel', 'Laravel is the best thing that has happened to PHP']);
});

// Eloquent

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

//  Return a Html just one item.

Route::get('/find', function(){

    $post = Post::find(1);
 
    return $post->title . '<br>' . $post->content;
     
});

//  Return an Object just one item

Route::get('/findWhere', function(){

    $posts = Post::where('id',[2])->orderBy('id', 'desc')->take(1)->get();

    
    return $posts;
     
});
