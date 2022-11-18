<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

        $posts = Post::all() ;
        return view('posts.index' , ['posts' => $posts]) ;
    }


    public function create()
    {
        $topics = Topic::all() ;
        return view('posts.create' , ['topics' => $topics]) ;
    }


    public function store(Request $request)
    {

        $data = $request->validate([
            'title'     => ['required' , 'unique:posts,title'] ,
            'body'      =>'required' ,
            'rate'      => 'required' ,
            'topic_id'  => 'required' ,
            'image'     => 'required' ,


        ]);
        $data['body'] = strip_tags($data['body']) ;
        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('images' , 'public') ;
        }
        $data['publish'] =(int)$request->has('publish') ? 1 : 0 ;
        $data['user_id'] = auth()->id() ;
         Post::create($data) ;

        return redirect('/admin/posts')->with('message' , 'Book Created Successfully !') ;

    }

    public function edit(Post $post)
    {
        $topics = Topic::all() ;
        return view('posts.edit' , [
            'post'  => $post  ,
            'topics' => $topics ,
            ]) ;
    }

    public function update(Request $request, Post $post)
    {
        if($post->user_id != auth()->id() ){
            abort(403 , 'Unauthorized Action');
        }
         $data = $request->validate([
            'title'     => 'required' ,
            'body'      => 'required' ,
            'rate'      => 'required' ,
            'topic_id'  => 'required' ,



        ]);
         $data['body'] = strip_tags($data['body']) ;
        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('images' , 'public') ;
        }
        $data['publish'] =(int)$request->has('publish') ? 1 : 0 ;
        $data['user_id'] = auth()->id() ;

         $post->update($data) ;

        return redirect('/admin/posts')->with('message' , 'Book Updated Successfully !') ;


    }

    public function destroy(Post $post)
    {
        if($post->user_id != auth()->id() ){
            abort(403 , 'Unauthorized Action');
        }
        $post->delete() ;
         return redirect('/admin/posts')->with('d-message' , 'Book Deleted Successfully !') ;

    }



}
