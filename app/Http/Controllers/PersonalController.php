<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function store(Request $request)
    {
        // Simpan data personal ke database
        return redirect()->back()->with('success', 'Data personal berhasil disimpan!');
    }
}
