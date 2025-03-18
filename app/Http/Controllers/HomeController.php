<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Panggil API
        $response = Http::get('https://rec25.ssmindonesia.com/job');
        
        // Periksa apakah request sukses
        if ($response->successful()) {
            $jobs = $response->json(); // Konversi response ke array
        } else {
            $jobs = []; // Jika gagal, set sebagai array kosong
        }
        
        // Kirim data ke view
        return view('home', compact('jobs'));
    }
}
