@extends('layouts.main')

@extends('layouts.navbar')

@section('title', 'Users')

@section('content')
    <div class="container">
        <div class="table-responsive">
            <table class="table table-bordered table-striped mt-5">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Posts Count</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->posts_count }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->links('pagination::bootstrap-4') }}
        </div>

    </div>
@endsection

