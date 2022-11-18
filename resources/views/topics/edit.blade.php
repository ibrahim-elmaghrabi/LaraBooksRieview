@extends('layouts.admin')

@section('content')
<div class="admin-content">
       <x-topics-buttons></x-topics-buttons>
    <div class="content">
        <h2 class="page-title">Edit Topic</h2>
        <form action="{{ route('admin.topics.update' , ['topic' => $topic->id]) }}" method="post">
            @csrf
            @method('PUT')
            <div>
                <label>Name</label>
                <input type="text" name="name" value="{{ $topic->name }}"  class="text-input" />
                @error('name')
                        <p class="text-red-500">{{ '*'.$message }}</p>
                    @enderror
            </div>
            <div>
                <label for="Description">Description</label>
                <textarea name="description" id="body" class="text-input">
                    {{ $topic->description}}
                </textarea>
                    @error('description')
                        <p class="text-red-500">{{ '*'.$message }}</p>
                    @enderror
            </div>
            <div>
                <button type="submit" name="updateTopic" class="btn btn-big">Update Topic</button>
            </div>
        </form>
    </div>
</div>
@endsection
