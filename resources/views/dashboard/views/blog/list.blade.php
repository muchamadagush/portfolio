@extends('layouts.myLayouts')

@section('content')
  <div class="container">
    <div id="blog">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

      <div class="list-blog">
        <h5>Artickel List</h3>
        <a href="{{ route('blogCreate') }}" class="btn btn-sm btn-primary"> + Add New</a>
      </div>

      <table class="table table-striped table-sm table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Title</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($blogs as $blog)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $blog->title }}</td>
            <td class="text-center">
              <a href="{{ route('blogEdit', ['id' => $blog->id]) }}" class="btn btn-sm btn-warning">Edit</a>
              <a href="{{ route('blogDestroy', ['id' => $blog->id]) }}" class="btn btn-sm btn-danger">Hapus</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
