@extends('layouts.admin')

@section('content')
<div class="admin-content">
       <x-topics-buttons></x-topics-buttons>
    <div class="content">
        <h2 class="page-title">Manage Topics</h2>
        <table>
            <thead>
                <th>SN</th>
                <th>Name</th>
                <th colspan="2">Action</th>
            </thead>
            <tbody>
                @foreach ($topics as $topic )
                <tr>
                    <td>{{ $topic->id }}</td>
                    <td>{{ $topic->name }}</td>
                    <td><a href="{{ route('admin.topics.edit' , ['topic' => $topic->id]) }}" class="edit">Edit</a></td>
                    <td>
                        <form action="{{ route('admin.topics.destroy' ,['topic' => $topic->id]) }}" method="post">
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

@endsection
