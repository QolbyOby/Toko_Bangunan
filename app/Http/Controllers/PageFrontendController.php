<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;

class PageFrontendController extends Controller
{
    public function lokasi() {
        return view('v_page.lokasi', [
            "judul" => "Lokasi",
            "subJudul" => "Lokasi Kami"
        ]);

    }
}
