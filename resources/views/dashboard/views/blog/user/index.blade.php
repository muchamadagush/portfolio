@extends('layouts.myLayouts', ['title' => 'Blog - Muchamad Agus Hermawan'])

@section('content')
<div id="blog">
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Blog</li>

        <div class="ml-auto">
          <form method="GET" action="#">
            <div class="input-group">
                <input type="text" class="form-control form-control-sm" name="q" value="{{ $request['q'] ?? '' }}">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary btn-sm">Search</button>
                </div>
            </div>
        </div>
      </ol>

    </nav>

    <div class="row">
      @foreach ($blogs as $blog)
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card">
          <img src="{{ 'uploads/images/blog' }}/{{ $blog->logo }}" alt="">
          <div class="card-body">
            <h5 class="card-title">{{ $blog->title }}</h5>
            <p class="card-text">{{  strip_tags(substr($blog->content, 0, 70))  }}</p>
            <a href="{{ route('blogShow', ['slug' => $blog->slug]) }}" class="btn btn-sm btn-primary">Read More</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <div class="pagination">
        {{ $blogs->links() }}
    </div>

  </div>
</div>
@endsection
