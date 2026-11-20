<?php

namespace App\Http\Controllers;

class AboutController extends Controller
{
    public function index()
    {
        $title = 'About';
        $nama = 'Muhamad Dzaki Abdurrohman';
        $hoby = 'Sepak Bola, Lari, Renang';
        $akun = 'thskii';

        return view('admin.about', [
            'title' => $title,
            'nama' => $nama,
            'hoby' => $hoby,
            'akun' => $akun,
        ]);
    }
}
