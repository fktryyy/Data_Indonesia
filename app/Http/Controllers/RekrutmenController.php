<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RekrutmenController extends Controller
{
    public function showForm()
    {
        return view('rekrutmen');
    }

    public function show(Request $request)
    {
        $job_id = $request->query('job_id'); // Ambil job_id dari URL
        return view('rekrutmen', compact('job_id'));
    }

    public function store(Request $request)
    {
        $response = Http::post('https://rec25.ssmindonesia.com/applicants', [
            'job_id' => 'required|integer',
            'stage_id' => 'required|integer',
            'name' => 'required|string', 
            'partner_name' => 'required|string',
            'no_ktp' => 'required|string',
            'email_from' => 'required|email',
            'jenis_kelamin' => 'required|integer',
            'nama_ibu' => 'required|string',
            'partner_mobile' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'provinsi' => 'required|string',
            'kabupaten' => 'required|string',
            'kecamatan' => 'required|string',
            'kelurahan' => 'required|string',
            'status_pernikahan' => 'required|integer', 
            'jumlah_anak' => 'required|integer',
            'tinggi_badan' => 'required|integer',
            'type_id' => 'required|integer', 
            'nama_sekolah' => 'required|string',
            'existing' => 'sometimes|boolean',
            'experience' => 'sometimes|integer',
            'nama_perusahaan' => 'required|string', 
            'posisi' => 'required|string', 
            'lama' => 'required|string', 
            'deskripsi' => 'required|string'
        ]);
        dd($response);

        // if ($response->successful()) {
        //     return redirect()->back()->with('success', 'Data berhasil disimpan!');
        // } else {
        //     return redirect()->back()->with('error', 'Gagal menyimpan data!');
        // }
    }
}
