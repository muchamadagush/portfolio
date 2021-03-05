@extends('layouts.myLayouts')

@section('css')
    <style>
        blockquote {
            background: #f9f9f9;
            border-left: 10px solid #ccc;
            margin: 1.5em 10px;
            padding: 0.5em 10px;
            quotes: "\201C""\201D""\2018""\2019";
        }
        blockquote:before {
            color: #ccc;
            content: open-quote;
            font-size: 4em;
            line-height: 0.1em;
            margin-right: 0.25em;
            vertical-align: -0.4em;
        }
        blockquote p {
            display: inline;
            font-style: italic;
        }
        blockquote h6 {
            font-weight: 700;
            padding: 0;
            margin: 0 0 .25rem;
        }
        .child-comment {
            padding-left: 50px;
        }
    </style>
@endsection

@section('content')
    <div id="blog">
      <div class="container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('blogIndex') }}">Blog</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $blog->title }}</li>
          </ol>
        </nav>

        <div class="row">
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="content">
              <h3 class="title">{{ $blog->title }}</h3>
              {!! $blog->content !!}
            </div>
          </div>

          <div class="col-lg-4 col-md-4">
            <div class="dashboard">

            </div>
          </div>
        </div>

        <div class="row py-5">
            <div class="col-md-6">
                <form action="{{ route('blogComment') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $blog->id }}" class="form-control">
                    <input type="hidden" name="parent_id" id="parent_id" class="form-control">
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" class="form-control" name="username">
                        <p class="text-danger">{{ $errors->first('username') }}</p>
                    </div>
                    <div class="form-group" style="display: none" id="formReplyComment">
                        <label for="">Balas Komentar</label>
                        <input type="text" id="replyComment" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Komentar</label>
                        <textarea name="comment" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <button class="btn btn-primary btn-sm">Kirim</button>
                </form>
            </div>
            <div class="col-md-6">
                @foreach ($blog->comments as $row)
                    <blockquote>
                        <h6>{{ $row->username }}</h6>
                        <hr>
                        <p>{{ $row->comment }}</p><br>
                        <a href="javascript:void(0)" onclick="balasKomentar({{ $row->id }}, '{{ $row->comment }}')">Balas</a>
                    </blockquote>
                    @foreach ($row->child as $val)
                        <div class="child-comment">
                            <blockquote>
                                <h6>{{ $val->username }}</h6>
                                <hr>
                                <p>{{ $val->comment }}</p><br>
                            </blockquote>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
      </div>
    </div>
@endsection

@section('js')
<script>
  function balasKomentar(id, title) {
      $('#formReplyComment').show();
      $('#parent_id').val(id)
      $('#replyComment').val(title)
  }
</script>
@endsection
