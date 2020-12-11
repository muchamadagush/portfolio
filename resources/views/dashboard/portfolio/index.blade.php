@extends('layouts.app')

@section('content')
<div class="container">

  <header>
      <h2><strong>List Portfolio</strong></h2>
      <a href="{{ route('portfolioCreate') }}" class="btn btn-primary btn-sm float-right m-1">Tambah Produk</a>
  </header>

  <table class="table table-bordered">
      <thead>
          <tr>
              <th>#</th>
              <th>Title</th>
              <th>Description</th>
              <th>Slug</th>
              <th>Image</th>
          </tr>
      </thead>

      <tbody>
          @php
              $no = 1;
          @endphp
          @foreach ($portfolios as $portfolio)
          <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $portfolio->title }}</td>
              <td>{{ $portfolio->description }}</td>
              <td>{{ $portfolio->slug }}</td>
              <td>{{ $portfolio->image }}</td>
              <td>
                  <a href="{{ route('portfolioEdit', ['id' => $portfolio->id]) }}" class="btn btn-success btn-sm">Edit</a>
                  <a href="{{ route('portfolioDestroy', ['id' => $portfolio->id]) }}" class="btn btn-danger btn-sm">Hapus</a>
              </td>
          </tr>
          @endforeach
      </tbody>
  </table>
</div>
@endsection