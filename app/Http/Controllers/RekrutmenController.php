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

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'partner_name' => 'required|string',            
            'no_ktp' => 'required|string',
            'email_from' => 'required|email',
            'jenis_kelamin' => 'required|string',
            'nama_ibu' => 'required|string',
            'partner_mobile' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'provinsi' => 'required|string',
            'kabupaten' => 'required|string',
            'kecamatan' => 'required|string',
            'kelurahan' => 'required|string',
            'status_pernikahan' => 'required|string',
            'jumlah_anak' => 'required|integer',
            'tinggi_badan' => 'required|integer',
            'jenjang' => 'required|integer',
            'nama_sekolah' => 'required|string',
            'existing' => 'sometimes|boolean',
            'experience' => 'sometimes|integer',
        ]);

        // Tambahkan default nilai untuk existing dan experience jika tidak dicentang
        $validatedData['existing'] = $request->has('existing') ? true : false;
        $validatedData['experience'] = $request->has('experience') ? (int) $request->input('experience') : 0;

        // Tambahkan job_id dan stage_id
        $validatedData['job_id'] = 1;
        $validatedData['stage_id'] = 1;

        // Kirim data ke API dengan format JSON
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->post('https://rec25.ssmindonesia.com/applicants', $validatedData);

        // Cek respons API
        if ($response->successful()) {
            return back()->with('success', 'Data berhasil dikirim!');
        } else {
            return back()->with('error', 'Gagal mengirim data! ' . $response->body());
        }
    }
}
