@extends('layouts.myLayouts', ['title' => 'About - Muchamad Agus Hermawan'])

@section('content')
<div class="container">
  <div id="about" class="about text-center">
    <h3>About Me</h3>
      <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae, voluptas. Sit veritatis quidem vel consectetur dolore odit quasi eum voluptates explicabo, dicta, nisi repellat hic natus atque iste quo quibusdam magni ipsa odio labore similique ducimus? Deleniti animi cumque eum ab consequatur illum impedit consequuntur iste dolorem accusamus porro et unde autem quod incidunt maiores sequi asperiores ullam, nesciunt esse! Eos, laudantium error earum voluptates a, sequi, fugiat natus doloremque consequatur nisi veniam neque odit culpa aperiam quidem quaerat? Obcaecati quia magnam sed sunt praesentium voluptate, at molestiae a reiciendis accusamus hic eaque error. Dolor dolores cum velit illum necessitatibus, eius quis et asperiores suscipit quae cumque eos quisquam deleniti perspiciatis deserunt maiores adipisci! Soluta, aliquid in alias voluptatum animi voluptatem nesciunt cum, hic nostrum blanditiis id incidunt vitae quis nulla? Ea aspernatur rerum ducimus et sint maiores repellat, saepe asperiores, doloribus ratione tempore nobis odit? Molestias culpa dolorum consequuntur.</p>

      <h3>My Skill's</h3>
      <div class="row">
        @foreach ($skills as $skill)
        <div class="col-lg-6 col-md-6 col-sm-12">
          <label for="{{ $skill->title }}">{{ $skill->title }}</label>
          <div class="progress">
            <div class="progress-bar {{ $skill->background }}" role="progressbar" style="width: {{ $skill->width }}%" aria-valuenow="{{ $skill->valuenow }}" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
        @endforeach
      </div>
  </div>
</div>
@endsection