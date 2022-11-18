<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class GuestController extends Controller
{
    public function index(){

        $topics = Topic::all() ;

        $posts = Post::all() ;

         $posts_search = Post::latest()->filter(request(['search','topic']))->get() ;

        return view('guests.index' , [
            'topics' => $topics ,
            'posts'  => $posts ,
            'posts_search' => $posts_search ,
        ]);
    }


    public function show(Post $post){
        $topics = Topic::all() ;
        $posts = Post::latest()->get() ;
        return view('guests.show' ,
        [
            'post' => $post ,
            'topics' => $topics ,
            'posts'  =>  $posts ,

        ]) ;
    }

    public function getTopic(Topic $topic){
        $postsForTopic = Post::where('topic_id', '=' , $topic->id)->get();
        $posts  = Post::all() ;
        $topics = Topic::all() ;

        return view('guests.topic' , [
            'postsForTopic' => $postsForTopic ,
            'topic' => $topic,
            'posts' => $posts ,
            'topics' => $topics ,
            ]) ;

    }


}
