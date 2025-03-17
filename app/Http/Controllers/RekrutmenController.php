<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RekrutmenController extends Controller
{
    public function create()
    {
        return view('rekrutmen');
    }

    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_ktp' => 'required|digits:16',
            'nomor_telepon' => 'required|string|max:15',
            'email' => 'required|email',
            'jenis_kelamin' => 'required',
            'nama_ibu' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat_lengkap' => 'required|string',
            'provinsi' => 'required|string',
            'kabupaten' => 'required|string',
            'kecamatan' => 'required|string',
            'kelurahan' => 'required|string',
            'status' => 'required|string',
            'anak' => 'nullable|integer|min:0',
            'tinggi_badan' => 'nullable|integer|min:100|max:250',
            'jenjang' => 'required|string',
            'sekolah_universitas' => 'required|string|max:255',
            'bekerja_di_ssm' => 'required|string',
            'pengalaman_kerja' => 'required|string',
        ]);

        // Kirim data ke API eksternal
        $response = Http::post('https://rec25.ssmindonesia.com/', [
            'nama' => $request->nama,
            'no_ktp' => $request->no_ktp,
            'nomor_telepon' => $request->nomor_telepon,
            'email' => $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nama_ibu' => $request->nama_ibu,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat_lengkap' => $request->alamat_lengkap,
            'provinsi' => $request->provinsi,
            'kabupaten' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'status' => $request->status,
            'anak' => $request->anak,
            'tinggi_badan' => $request->tinggi_badan,
            'jenjang' => $request->jenjang,
            'sekolah_universitas' => $request->sekolah_universitas,
            'bekerja_di_ssm' => $request->bekerja_di_ssm,
            'pengalaman_kerja' => $request->pengalaman_kerja,
        ]);

        // Cek apakah request berhasil
        if ($response->successful()) {
            return redirect()->route('rekrutmen.create')->with('success', 'Lamaran berhasil dikirim!');
        } else {
            return redirect()->route('rekrutmen.create')->with('error', 'Gagal mengirim lamaran, coba lagi.');
        }
    }
}
