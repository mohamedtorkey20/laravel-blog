@extends('layouts.main')

@section('title', 'Create Post')

@extends('layouts.navbar')

@section('content')

<section class="bg-light p-3 p-md-5 p-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h1 class="mb-4 col-6 offset-4">Create post</h1>
                        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 col-6 offset-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" class="form-control form-control-md" id="title" placeholder="Enter title" value="{{ old('title') }}">
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-6 offset-3">
                                <label for="content" class="form-label">Body</label>
                                <textarea name="body" class="form-control form-control-md" id="content" rows="5" placeholder="Enter body">{{ old('body') }}</textarea>
                                @error('body')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="mb-3 col-6 offset-3">
                                <label for="date" class="form-label">image</label>
                                <input type="file" name="image">
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-6 offset-3 form-check">
                                <input  name="enabled" class="form-check-input" type="checkbox" value="0" id="flexCheckChecked" @if(old('enabled')) checked @endif>
                                <label class="form-check-label" for="flexCheckChecked">
                                    Enabled
                                </label>

                            </div>

                            </div>
                            <button type="submit" class="btn btn-primary btn-lg col-6 offset-3 mt-4 mb-5">Post</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
