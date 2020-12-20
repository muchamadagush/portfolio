@extends('layouts.myLayouts', ['title' => 'Portfolio - Muchamad Agus Hermawan'])

@section('css')
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">   
@endsection

@section('content')
  <div class="container pt-5">
    <div class="card card-portfolio mt-5">
      <div class="button">
        <a href="{{ route('portfolioDisplay') }}" class="btn btn-sm btn-warning"><i class="fa fa-chevron-circle-left" aria-hidden="true"> Back</i></a>
      </div>

      <div class="card-header mb-2">
        <h5>Detail {{ $portfolio->title }}</h5>
      </div>

      <div class="card-body">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12">
            <img class="card-img-top" src="{{ '../../uploads/images/portfolio' }}/{{ $portfolio->image }}">
          </div>

          <div class="col-lg-6 col-md-6 col-sm-12">
            <table class="table">
              <tr>
                <td>Name</td>
                <td>{{ $portfolio->title }}</td>
              </tr>

              <tr>
                <td>description</td>
                <td>{{ $portfolio->description }}</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection