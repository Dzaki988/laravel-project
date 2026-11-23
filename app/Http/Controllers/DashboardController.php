<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        $content = 'Selamat datang di dashboard admin';

        return view('admin.dashboard', [
            'title' => $title,
            'content' => $content,
        ]);
    }
}
