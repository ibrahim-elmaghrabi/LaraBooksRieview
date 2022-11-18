@extends('layouts.app')

@section('content')
<!-- page wrapper/slider-->
    <div class="page-wrapper">
        <!-- content -->
     <div class="content clearfix">
        <div class="main-content">
            <h1 class="recent-post-title">{{ $topic->name }}</h1>
             @foreach ($postsForTopic as $post )
             <a href="{{ route('posts.show' , ['post' => $post->id]) }}">
                <div class="post clearfix">
                    <img src="{{ asset('storage/'.$post->image) }}" alt="" class="post-image">
                    <div class="post-preview">
                        <h2><a href="{{ route('posts.show' ,['post' => $post->id]) }}">{{ $post->title }}</a></h2>
                        <i class="far fa-user"></i>&nbsp;{{ $post->user->name }}
                        &nbsp; &nbsp;
                        <i class="far fa-calendar"></i>&nbsp;{{ $post->created_at->format('F j,Y') }}
                        <p class="preview-text" >
                            {{  Str::substr($post->body, 0, 150)."......." }}
                        </p>
                        <a href="{{ route('posts.show' ,['post'=>$post->id]) }}" class="btn read-more" >Read More</a>
                    </div>
                </div>
             </a>
             @endforeach
        </div>
            <!-- sidebar-->
            <div class="sidebar single">
                <div class="section popular">
                    <h2 class="section-title">Popular</h2>
                    @foreach ($posts as $post )
                        @if ($loop->index < 4)
                            <div class="post clearfix">
                                <img src="{{ asset('storage/'.$post->image) }}" >
                                <a href="{{ route('posts.show' ,['post' => $post->id]) }}" class="title"><h4>{{ $post->title }}</h4></a>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="section topics">
                <h2 class="section-title">Topics</h2>
                <ul>
                     @foreach ($topics as $topic )
                        <x-topics :topic=$topic ></x-topics>
                    @endforeach
                </ul>
            </div>
            </div>
            <!-- //  sidebar-->
        </div>
        <!--- // content -->
    </div>
    <!--- /// page wrapper-->

<x-footer></x-footer>


@endsection
