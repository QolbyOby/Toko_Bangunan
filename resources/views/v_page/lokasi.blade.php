@extends('v_layouts.app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="billing-details">
            <p> {{$judul}} </p>
            <div class="section-title">
                <h3 class="title">{{$subJudul}} </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.795815631936!2d106.77582140991318!3d-6.4202759935438305!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e97c394cb877%3A0x4cba9dad344be24d!2sRumah%20Singkong%20NikNok!5e0!3m2!1sid!2sid!4v1714967356379!5m2!1sid!2sid" width="850" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>

@endsection