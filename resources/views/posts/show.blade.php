@extends('layouts.main')

@section('title', 'show Post')

@extends('layouts.navbar')
@section('content')

<section class="bg-light p-3 p-md-5 p-sm-5">
 <div class="container">
     <div class="row justify-content-center">
         <div class="col-lg-8">
             <div class="card shadow-sm">
                 <div class="card-body">
                     <h1 class="card-title">{{$post->title}}</h1>
                     <p class="card-text text-muted"> publish at {{ $post->published_at}}</p>
                     <div class="card-text">
                        <p>{{ $post->body }}</p>
                     </div>
                     <p class="card-text text-muted"> Ceated at {{$post->created_at}}</p>

                        @isset($post->image)
                        <img src="{{ asset(Storage::disk('public')->url($post -> image)) }}" alt="Post Image">
                        @endisset


                 </div>
             </div>
         </div>
     </div>
 </div>
</section>
@endsection
