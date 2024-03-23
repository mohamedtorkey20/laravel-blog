@extends('layouts.main')

@section('title', 'Edit Post')

@extends('layouts.navbar')

@section('content')
<section class="bg-light p-3 p-md-5 p-sm-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="card shadow-sm">
            <div class="card-body">
              <h1 class="mb-4 col-6 offset-4">Edit Post</h1>
              <form method="POST" action="{{ route('posts.update', ['id' => $post->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3  col-6 offset-3">
                  <label for="title" class="form-label">Title</label>
                  <input type="text"   name="title" class="form-control form-control-md" id="title" placeholder="Enter title" value="{{$post->title}}">

                </div>
                <div class="mb-3 col-6 offset-3">
                  <label for="content" class="form-label">body</label>
                  <textarea   name="body" class="form-control form-control-md" id="content" rows="5" placeholder="Enter body" value="">{{$post->body}}</textarea>

                </div>

                <div class="mb-3 col-6 offset-3 form-check">
                    <input  name="enabled" class="form-check-input" type="checkbox" value="{{$post->enabled}}" id="flexCheckChecked" @if($post->enabled==1) checked @endif>
                    <label class="form-check-label" for="flexCheckChecked">
                        Enabled
                    </label>

                </div>

                <button type="submit" class="btn btn-primary btn-lg col-6 offset-3 mt-4">Update Post</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection

