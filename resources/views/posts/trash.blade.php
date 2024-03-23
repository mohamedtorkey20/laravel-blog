@extends('layouts.main')

@section('title', 'Deleted Posts')

@extends('layouts.navbar')

@section('content')
<body>
    <div class="container mt-5">
        <h2>Deleted Posts</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Enabled</th>
                    <th>deleted At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($deletedPosts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->enabled ? 'Yes' : 'No' }}</td>
                        <td>{{ $post->deleted_at }}</td>
                        <td>
                            <form action="{{ route('posts.restore', $post->id) }}" method="POST"  style="display: inline" >
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn btn-success">Restore</button>
                            </form>
                            <form action="{{ route('posts.delete-permanently', $post->id) }}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete Permanently</button>
                            </form>
                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
