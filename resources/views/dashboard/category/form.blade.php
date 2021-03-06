@extends('layouts.app')

@section('content')
    <div class="container">
      <form action="{{ route($url) }}" method="post">
        @csrf

        <div class="row">
          <input class="form-control" type="hidden" name="id" value="{{ old('', $category->id ?? '') }}">

          <div class="col-8 offset-2">
            <div class="form-group row">
              <label for="title" class="col-4 col-form-label">{{ __('Title') }}</label>

              <div class="col">
                  <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $category->title ?? '') }}" required autocomplete="title" autofocus>

                  @error('title')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="status" class="col-4 col-form-label">{{ __('Status') }}</label>

              <div class="col-6">
                  <input type="text" id="status" class="form-control @error('status') is-invalid @enderror" name="status" value="{{ old('status', $category->status ?? '') }}" required autocomplete="status" autofocus>

                  @error('status')
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
