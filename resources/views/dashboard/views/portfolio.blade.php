@extends('layouts.myLayouts', ['title' => 'Portfolio - Muchamad Agus Hermawan'])

@section('css')
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('content')
<div class="pt-5">
  <div class="container">
    <h2 class="text-center mt-5">Portfolios</h2>

    <div class="row">

      @foreach ($portfolios as $portfolio)
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="card">
            <div class="card-header">
              {{ $portfolio->title }}
            </div>

            <div class="card-body">
              <a href="{{ route('portfolioDetail', ['id' => $portfolio->id]) }}"><img src="{{ 'uploads/images/portfolio' }}/{{ $portfolio->image }}" alt="" class="card-img"></a>
            </div>
          </div>
        </div>
      @endforeach

    </div>

    <div class="pagination">
      {{ $portfolios->links() }}
    </div>
  </div>
</div>
@endsection
