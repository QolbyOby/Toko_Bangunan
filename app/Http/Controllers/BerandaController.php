<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;

class BerandaController extends Controller
{
    public function berandaBackend()
    { 
        $produk = Produk::all()->count();
        $kategori = Kategori::all()->count();
        return view('backend.v_beranda.index', [
            'judul' => 'Halaman Beranda',
            'produk' => $produk,
            'kategori' => $kategori
        ]);
    }

    public function index() 
    { 
        $produk = Produk::where('status', 1)->orderBy('updated_at', 'desc')->paginate(6); 
        return view('v_beranda.index', [ 
            'judul' => 'Halan Beranda', 
            'produk' => $produk, 
        ]); 
    } 
}
