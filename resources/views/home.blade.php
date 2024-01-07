@extends('layout.main')

@section('content')
    <div class="container d-flex gap-5 mt-5">
        @foreach($categoryBlogs as $cat)
            <div class="card" style="width: 18rem;">
                <div class="card-header" style="font-weight: bold">
                    <h5 class="card-title font-weight-bold">{{ $cat->title }}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">{!! strip_tags(Str::limit($cat->content,200,'...')) !!}</p>
                </div>
                <div class="card-footer">
                    <h2><a class="btn btn-primary" href="{{ url('/blog/'.$cat->slug) }}">Read</a></h2>
                </div>
            </div>
        @endforeach

    </div>
@endsection
