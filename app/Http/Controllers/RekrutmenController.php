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

    public function Store(Request $request)
    {
        $request->validate([
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
            'existing' => 'required|boolean',
            'experience' => 'required|integer',
        ]);

        $data = $request->all();
        $data['job_id'] = 1;
        $data['stage_id'] = 1;

        $response = Http::post('https://rec25.ssmindonesia.com/', $data);

        if ($response->successful()) {
            return back()->with('success', 'Data berhasil dikirim!');
        } else {
            return back()->with('error', 'Gagal mengirim data!');
        }
    }
}
