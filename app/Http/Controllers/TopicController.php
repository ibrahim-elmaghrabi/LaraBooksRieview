<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{

    public function index()
    {
        $topics = Topic::all() ;
        return view('topics.index' , ['topics' => $topics]) ;
    }

    public function create()
    {
        return view('topics.create') ;
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required' ,
            'description' => 'required' ,
        ]);
         $data['description'] = strip_tags($data['description']) ;
        Topic::create($data) ;

        return redirect('/admin/topics/')->with('message', 'Topic Created Successfully !') ;
    }


    public function edit(Topic $topic)
    {
        return view('topics.edit' , ['topic' => $topic]) ;
    }

    public function update(Request $request, Topic $topic)
    {
        $data = $request->validate([
            'name' => 'required' ,
            'description' => 'required' ,
        ]);
         $data['description'] = strip_tags($data['description']) ;
            $topic->update($data) ;

        return redirect('/admin/topics/')->with('message', 'Topic Updated Successfully !') ;

    }

    public function destroy(Topic $topic)
    {
        $topic->delete();

        return redirect('/admin/topics')->with('d-message' , 'Topic Deleted Successfully ') ;
    }
}
