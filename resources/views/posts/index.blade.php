@extends('layouts.admin')

@section('content')
<!-- Admin content-->
        <div class="admin-content">
             <x-posts-buttons></x-posts-buttons>
            <div class="content">
                <h2 class="page-title">Manage Books</h2>
                <table>
                    <thead>
                        <th>SN</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Poster</th>
                        <th>Rate</th>
                        <th colspan="3">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post )
                        <tr>
                            <td>{{ $post->id   }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->user->name }}</td>
                            <td><img src="{{ asset('storage/'.$post->image) }}" style="width: 100px ; height: 100px ;"></td>
                            <td>{{ $post->rate }}</td>
                            <td><a href="{{ route('admin.posts.edit' , ['post' => $post->id]) }}" class="edit">Edit</a></td>
                            <td>
                                <form action="{{ route('admin.posts.destroy' , ['post' => $post->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete">Delete</button>
                                </form>
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- // Admin Content-->
@endsection
