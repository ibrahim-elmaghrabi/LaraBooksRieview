@extends('layouts.app')

@section('content')

<div class="page-wrapper">
    <!---page slider-->
    <div class="post-slider">
        <h1 class="slider-title">Trending Books</h1>
        <i class="fas fa-chevron-left prev"></i>
        <i class="fas fa-chevron-right next "></i>
        <div class="post-wrapper">
             @foreach ($posts as $post )
                @if($loop->index < 5 )
                     <a href="{{ route('posts.show' , ['post' => $post->id]) }}">
                        <div class="post clearfix">
                        <img src="{{ asset('storage/'.$post->image) }}" class="slider-image">
                        <div class="post-info">
                            <h4><a href="{{ route('posts.show' , ['post' => $post->id]) }}">{{ $post->title }}</a></h4>
                            <i class="far fa-user"></i>&nbsp;{{ $post->user->name }}
                            &nbsp; &nbsp;
                            <i class="far fa-calendar"></i>{{ $post->created_at->format('F j,Y') }}
                         </div>
                    </div>
                     </a>
                     @endif
             @endforeach
        </div>
    </div>
         <!------- content-------------- -->
    <div class="content clearfix">
        <div class="main-content">
            <h1 class="recent-post-title">Recent Books</h1>
             @foreach ($posts_search as $post )
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
        <!----------------- search --------------->
         <div class="sidebar">
            <div class="section search">
                <h2 class="section-title">Search</h2>
                <form action="/posts" method="GET">
                    <input type="text" name="search" class="text-input" placeholder="Search By Title...">
                </form>
            </div>
            <!--- topics --->
            <div class="section topics">
                <h2 class="section-title">Topics</h2>
                <ul>
                     @foreach ($topics as $topic )
                        <x-topics :topic=$topic ></x-topics>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<x-footer ></x-footer>
@endsection
