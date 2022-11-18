@extends('layouts.admin')
@section('content')

<div class="admin-content">
    <x-posts-buttons></x-posts-buttons>
    <div class="content">
        <h2 class="page-title">Edit Book</h2>
        <form action="{{ route('admin.posts.update' ,['post' => $post->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <label>Title</label>
                <input type="text" name="title" value="{{ $post->title }}" class="text-input" />
                     @error('title')
                            <p class="text-red-500">{{ '*'.$message }}</p>
                     @enderror
                </div>
            <div>
                <label for="body">Body</label>
                <textarea type="text" name="body" id="body" >
                    {{ $post->body }}
                </textarea>
                     @error('body')
                            <p class="text-red-500">{{ '*'.$message }}</p>
                     @enderror
            </div>
            <div>
                <label for="rate">Rate</label>
                    <input type="number" name="rate" min="1" max="10" value="{{ $post->rate }}"  class="text-input" />
                     @error('rate')
                            <p class="text-red-500">{{ '*'.$message }}</p>
                     @enderror
            </div>
            <div>
                <label for="image">Image</label>
                <input type="file" name="image" value=""  class="text-input">
                <img src="{{ asset('storage/'.$post->image) }}" style="width: 100px ; height: 100px"  >
                     @error('image')
                            <p class="text-red-500">{{ '*'.$message }}</p>
                     @enderror
            </div>
              <div>
                <label>Topic</label>
                <select name="topic_id" class="text-input">
                        <option>select topic.....</option>
                    @foreach ($topics as $topic )
                            <option value="{{ $topic->id }}" @if($topic->id == $post->topic_id) selected  @endif  >
                                {{ $topic->name }}
                            </option>
                    @endforeach
                </select>
                    @error('topic_id')
                    <p class="text-red-500">{{ '* please select topic ' }}</p>
                    @enderror
            </div>
            <div>
                <input type="checkbox"  name="publish"  @if($post->publish) ?  checked @endif >publis
            </div>
            <div>
                <button type="submit" name="update" class="btn btn-big">update</button>
            </div>
        </form>
    </div>
</div>

@endsection
