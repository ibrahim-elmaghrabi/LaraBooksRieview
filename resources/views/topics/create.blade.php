@extends('layouts.admin')

@section('content')
 <!-- Admin content-->
        <div class="admin-content">
            <x-topics-buttons></x-topics-buttons>
            <div class="content">
                <h2 class="page-title">Add Topic</h2>
                <form action="{{ route('admin.topics.store') }}" method="post">
                    @csrf
                    <div>
                        <label>Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="text-input" />
                    </div>
                    @error('name')
                        <p class="text-red-500">{{ '*'.$message }}</p>
                    @enderror
                    <div>
                        <label for="Description">Description</label>
                        <textarea name="description" id="body">
                            {{ old('description') }}
                        </textarea>
                    </div>
                     @error('description')
                        <p class="text-red-500"> {{'*'.$message }} </p>
                    @enderror

                    <div>
                        <button type="submit" name="addTopic" class="btn btn-big">Add Topic</button>
                    </div>
                </form>
            </div>
        </div>

@endsection
