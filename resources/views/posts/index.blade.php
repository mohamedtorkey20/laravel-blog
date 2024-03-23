@extends('layouts.main')

@section('title', 'Posts')


@extends('layouts.navbar')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-12 mt-5">

                <table class="table table-bordered table-striped ">

                    <thead>
                        <tr>

                            <th scope="col">Title</th>
                            <th scope="col">Body</th>
                            <th scope="col">published_by</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td><a href="{{ route('posts.show', $post->id)}}">{{ $post->title }}</a></td>
                            <td>{{ $post->body }}</td>
                            <td>{{ $post->user->name}}</td>
                            @if ($post->user_id===$user_Id)

                            <td>
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-success">update</a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>

                            </td>

                            @endif

                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $posts->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
