@extends('backend.v_layouts.app')
@section('content')
    <h3> {{ $judul }} </h3>
    <p>
        Selamat Datang, <b>{{ Auth::user()->nama }}</b> pada aplikasi Toko Online dengan hak akses yang anda miliki sebagai
        <b>{{ Auth::user()->role == 1 ? 'Super Admin' : 'Admin' }}</b> ini adalah halaman utama dari aplikasi ini.
    </p>
    <div class="row">
        <div class="col-md-6 col-lg-4 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-danger text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-shopping"></i></h1>
                    <h6 class="text-white">{{ $produk }} Produk</h6>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-info text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-clipboard-text"></i></h1>
                    <h6 class="text-white">{{ $kategori }} kategori</h6>
                </div>
            </div>
        </div>
    </div>
@endsection
