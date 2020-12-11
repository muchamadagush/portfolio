@extends('layouts.app')

@section('content')
    <div class="container">
      <form action="{{ route($url) }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row">
          <input class="form-control" type="hidden" name="id" value="{{ old('', $portfolio->id ?? '') }}">
          
          <div class="col-8 offset-2">
            <div class="form-group row">
              <label for="title" class="col-4 col-form-label">{{ __('Title') }}</label>

              <div class="col">
                  <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $portfolio->title ?? '') }}" required autocomplete="title" autofocus>

                  @error('title')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="description" class="col-4 col-form-label">{{ __('Description') }}</label>

              <div class="col-6">
                  <input type="text" id="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description', $portfolio->description ?? '') }}" required autocomplete="description" autofocus>

                  @error('description')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="image" class="col-4 col-form-label">{{ __('Image') }}</label>

              <div class="col-6">
                  <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" value="{{ old('image', $portfolio->image ?? '') }}" required autocomplete="image" autofocus>

                  @error('image')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>
            
            <div class="form-group row mb-0">
              <div class="col-lg-6 offset-lg-4">
                <button class="btn btn-primary btn-sm" type="submit">
                  {{ __($button) }}
                </button>
              </div>
            </div>
          </div>
        </div>
    </form>
    </div>
@endsection