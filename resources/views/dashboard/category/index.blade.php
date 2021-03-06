@extends('layouts.app')

@section('content')
<div class="container">

  <header>
      <h2><strong>List Kategori</strong></h2>
      <a href="{{ route('categoryCreate') }}" class="btn btn-primary btn-sm float-right m-1">Tambah Kategori</a>
  </header>

  <table class="table table-sm table-hover">
      <thead>
          <tr>
              <th>#</th>
              <th>Title</th>
              <th>Status</th>
              <th class="text-center">Action</th>
          </tr>
      </thead>

      <tbody>
          @php
              $no = 1;
          @endphp
          @foreach ($categories as $category)
          <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $category->title }}</td>
              <td>{{ $category->status }}</td>
              <td class="text-center">
                  <a href="{{ route('categoryEdit', ['category' => $category->id]) }}" class="btn btn-success btn-sm">Edit</a>
                  <a href="{{ route('categoryDestroy', ['category' => $category->id]) }}" class="btn btn-danger btn-sm">Hapus</a>
              </td>
          </tr>
          @endforeach
      </tbody>
  </table>

  <div class="paginate">
      {{ $categories->links() }}
  </div>
</div>
@endsection
