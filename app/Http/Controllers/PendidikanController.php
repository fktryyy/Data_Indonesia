<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PendidikanController extends Controller
{
    public function store(Request $request)
    {
        // Simpan data pendidikan dan pengalaman ke database
        return redirect()->back()->with('success', 'Data pendidikan & pengalaman berhasil disimpan!');
    }
}
