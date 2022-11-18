@extends('layouts.admin')

@section('content')

    <!-- Admin  page wrapper/slider-->

         <!--// left sidebar-->

         <!-- Admin content-->
        <div class="admin-content">
             <x-posts-buttons></x-posts-buttons>
            <div class="content">
                <h2 class="page-title">Add Book</h2>
                <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label>Title</label>
                        <input type="text" name="title" value="{{ old('title') }}" class="text-input" />
                    </div>
                        @error('title')
                            <p class="text-red-500">{{ '*'.$message }}</p>
                        @enderror
                    <div>
                        <label for="body">Body</label>
                        <textarea readonly  name="body" id="body">
                            {{ old('body') }}
                        </textarea>
                          @error('body')
                            <p class="text-red-500">{{ '*'.$message }}</p>
                          @enderror
                    </div>
                    <div>
                        <label for="rate">Rate</label>
                         <input type="number" name="rate" min="1" max="10" value="{{ old('rate') }}"  class="text-input" />
                           @error('rate')
                            <p class="text-red-500">{{ '*'.$message }}</p>
                          @enderror
                    </div>
                    <div>
                        <label for="image">Image</label>
                        <input type="file" name="image" class="text-input">
                          @error('image')
                            <p class="text-red-500">{{ '*'.$message }}</p>
                          @enderror
                    </div>
                    <div>
                        <label>Topic</label>
                        <select name="topic_id" class="text-input">
                             <option>select topic.....</option>
                            @foreach ($topics as $topic )
                                 <option value="{{ $topic->id }}" {{ old('topic_id' , 'topic_id' ) ==1 ? "selected" : "" }}>
                                    {{ $topic->name }}
                                 </option>
                            @endforeach
                        </select>
                        @error('topic_id')
                            <p class="text-red-500">{{ $message }}</p>
                          @enderror

                    </div>
                    <div>

                        <input type="checkbox" name="publish" @if( old('publish') )  checked @endif > publish

                    </div>

                    <div>
                        <button type="submit" class="btn btn-big">Add Book</button>
                    </div>
                </form>
            </div>
        </div>
         <!-- // Admin Content-->

    <!--- /// admin wrapper-->
@endsection
