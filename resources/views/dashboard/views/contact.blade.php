@extends('layouts.myLayouts')

@section('css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('content')
<div class="pt-5">
    <div class="container">
      <h2 class="text-center mt-5">Contact Us</h2>
      <div class="row">
        <div class="col-md-7 col-sm-12">
          <div class="card bg-primary text-white text-center">
            <i class="fa fa-map-marker fa-5x" aria-hidden="true"></i>
            <h3 class="card-title font-weight-bold">Contact</h3>
            <p class="card-text">Web Programmer & Development</p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Muchamad Agus Hermawan</li>
            <li class="list-group-item">muchamadagush@gmail.com</li>
            <li class="list-group-item">Jl. Raya Blimbing-Gudo, Jombang</li>
            <li class="list-group-item">East Java, Indonesia</li>
          </ul>
        </div>
          {{-- <div class="row"> --}}
          <div class="col-md-5 col-sm-12">
            <div class="card">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d742.7445717902267!2d112.21523882913677!3d-7.635843670442946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwMzgnMDkuMCJTIDExMsKwMTInNTYuOCJF!5e1!3m2!1sid!2sid!4v1583342227389!5m2!1sid!2sid" width="100%" height="325" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
          </div>
        </div>
        <div class="row">
        </div>
        <div class="middle mt-5">
          <a class="but" href="https://www.instagram.com/muchamadagushermawan/">
            <i class="fa fa-instagram"></i>
          </a>
          <a class="but" href="https://api.whatsapp.com/send?phone=6282131571915&text=Hallo%20Muchamad%20Agus%20Hermawan">
            <i class="fa fa-whatsapp"></i>
          </a>
          <a class="but" href="https://www.youtube.com/channel/UCyCAnXhCN7ff37XqFOY2mAw">
            <i class="fa fa-youtube"></i>
          </a>
        </div>
      {{-- </div> --}}
</div>
@endsection
