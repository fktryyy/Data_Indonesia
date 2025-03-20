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
        $job_id = $request->query('job_id');
        return view('rekrutmen', compact('job_id'));
    }

    public function store(Request $request)
    {
        $data = [
                'job_id' => $request->job_id,
                'stage_id' => $request->stage_id,
                'name' => $request->name,
                'partner_name' => $request->partner_name,
                'no_ktp' => $request->no_ktp,
                'email_from' => $request->email_from,
                'jenis_kelamin' => $request->jenis_kelamin,
                'nama_ibu' => $request->nama_ibu,
                'partner_mobile' => $request->partner_mobile,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'alamat' => $request->alamat,
                'provinsi' => $request->provinsi,
                'kabupaten' => $request->kabupaten,
                'kecamatan' => $request->kecamatan,
                'kelurahan' => $request->kelurahan,
                'status_pernikahan' => $request->status_pernikahan,
                'jumlah_anak' => $request->jumlah_anak,
                'tinggi_badan' => $request->tinggi_badan,
                'type_id' => $request->type_id,
                'nama_sekolah' => $request->nama_sekolah,
                'existing' => $request->existing ?? null,
                'experience' => $request->experience ?? null,
                'nama_perusahaan' => $request->nama_perusahaan,
                'posisi' => $request->posisi,
                'lama' => $request->lama,
                'deskripsi' => $request->deskripsi
        ];
        dd($data);
//         $response = Http::withHeaders([
//             'Accept' => 'application/json',
//             'Content-Type' => 'application/json'
//         ])->post('https://rec25.ssmindonesia.com/applicants', $data);
        
       
//         if ($response->successful()) {
//             return redirect()->back()->with('success', 'Data berhasil disimpan!');
//         } else {
           
//             return redirect()->back()->with('error', 'Gagal menyimpan data!');
//          }
    }

}