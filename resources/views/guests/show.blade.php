@extends('layouts.app')

@section('content')
<!-- page wrapper/slider-->
    <div class="page-wrapper">
        <!-- content -->
        <div class="content clearfix">
            <!-- main content wrapper-->
            <div class="main-content-wrapper">
                <!-- main content-->
                <div class="main-content single">
                    <h1 class="post-title">{{ $post->title }}</h1>
                    <img src="{{ asset('storage/'.$post->image) }}" class="content-image">
                    <div class="post-content">
                        <p>{{ $post->body }}</p>
                    </div>
                </div>
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
