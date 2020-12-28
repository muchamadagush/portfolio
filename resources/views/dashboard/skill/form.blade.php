@extends('layouts.app')

@section('content')
  <div class="container">
    <form action="{{ route($url) }}" method="post">
      @csrf

      <div class="row">
        <input class="form-control" type="hidden" name="id" value="{{ old('id', $skill->id ?? '') }}">

        <div class="col-8 offset-2">
          <div class="form-group row">
            <label for="title" class="col-4 col-form-label">{{ __('Title') }}</label>

            <div class="col">
                <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $skill->title ?? '') }}" required autocomplete="title" autofocus>

                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="background" class="col-4 col-form-label">{{ __('Background') }}</label>

            <div class="col">
                <input type="text" id="background" class="form-control @error('background') is-invalid @enderror" name="background" value="{{ old('background', $skill->background ?? '') }}" required autocomplete="background" autofocus>

                @error('background')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="valuenow" class="col-4 col-form-label">{{ __('Valuenow') }}</label>

            <div class="col">
                <input type="text" id="valuenow" class="form-control @error('valuenow') is-invalid @enderror" name="valuenow" value="{{ old('valuenow', $skill->valuenow ?? '') }}" required autocomplete="valuenow" autofocus>

                @error('valuenow')
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