@extends('layouts.myLayouts');

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
<div id="blog">
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('blogList') }}">Blog List</a></li>
        <li class="breadcrumb-item active" aria-current="page">Create Artickel</li>
      </ol>
    </nav>

    <form action="{{ route($url) }}" method="POST">
      @csrf

      <div class="form-group">
        <label for="title">Title</label>
        <input name="title" type="text" class="form-control" id="title" placeholder="Title of Artickel" required>
      </div>

      <div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" class="form-control ckeditor" id="content" rows="10" required></textarea>
      </div>

      <div class="form-group mb-0">
        <button type="submit" class="btn btn-sm btn-primary">{{ $button }}</button>
      </div>

    </form>
  </div>
</div>
@endsection

@section('js')
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace( 'content', {
  filebrowserUploadUrl: "{{route('blogImage', ['_token' => csrf_token() ])}}",
  filebrowserUploadMethod: 'form'
});
</script>
@endsection
