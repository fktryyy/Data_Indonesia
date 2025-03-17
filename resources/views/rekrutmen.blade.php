<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Rekrutmen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h2, h3 {
            color: #333;
        }
        label {
            display: block;
            text-align: left;
            margin-top: 10px;
            font-weight: bold;
        }
        input, select, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        textarea {
            resize: vertical;
            height: 80px;
        }
        .button {
            display: inline-block;
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background: #007BFF;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }
        .button:hover {
            background: #0056b3;
        }
        .section {
            text-align: left;
            margin-top: 20px;
            padding: 15px;
            background: #e9ecef;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Form Personal</h2>
        <form action="{{ route('personal.store') }}" method="POST">
            @csrf
            <label>Nama:</label>
            <input type="text" name="nama" required>
            <label>No. KTP:</label>
            <input type="text" name="no_ktp" maxlength="16" required>
            <label>Nomor Telepon:</label>
            <input type="text" name="nomor_telepon" required>
            <label>Alamat Email:</label>
            <input type="email" name="email" required>
            <label>Jenis Kelamin:</label>
            <select name="jenis_kelamin" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <label>Nama Ibu:</label>
            <input type="text" name="nama_ibu" required>
            <label>Tempat Lahir:</label>
            <input type="text" name="tempat_lahir" required>
            <label>Tanggal Lahir:</label>
            <input type="date" name="tanggal_lahir" required>
            <label>Alamat Lengkap:</label>
            <textarea name="alamat_lengkap" required></textarea>
            <label>Provinsi:</label>
            <input type="text" name="provinsi" required>
            <label>Kabupaten:</label>
            <input type="text" name="kabupaten" required>
            <label>Kecamatan:</label>
            <input type="text" name="kecamatan" required>
            <label>Kelurahan:</label>
            <input type="text" name="kelurahan" required>
            <label>Status:</label>
            <select name="status" required>
                <option value="">Pilih Status</option>
                <option value="Belum Menikah">Belum Menikah</option>
                <option value="Menikah">Menikah</option>
                <option value="Cerai">Cerai</option>
            </select>
            <label>Anak:</label>
            <input type="number" name="anak" min="0">
            <label>Tinggi Badan (cm):</label>
            <input type="number" name="tinggi_badan" min="100" max="250">
            <button type="submit" class="button">Kirim</button>
        </form>
    </div>

    <div class="container">
        <h2>Form Pendidikan & Pengalaman</h2>
        <form action="{{ route('pendidikan.store') }}" method="POST">
            @csrf
            <h3>Pendidikan</h3>
            <label>Jenjang:</label>
            <select name="jenjang" required>
                <option value="">Pilih Jenjang</option>
                <option value="SD">SD</option>
                <option value="SMP">SMP</option>
                <option value="SMA">SMA</option>
                <option value="Diploma">Diploma</option>
                <option value="S1">S1</option>
                <option value="S2">S2</option>
            </select>
            <label>Sekolah/Universitas:</label>
            <input type="text" name="sekolah_universitas" required>
            <h3>Pengalaman</h3>
            <label>Bekerja di PT. SSM:</label>
            <select name="bekerja_di_ssm" required>
                <option value="Tidak Pernah">Tidak Pernah</option>
                <option value="Pernah">Pernah</option>
            </select>
            <label>Pengalaman Kerja Perusahaan Lain:</label>
            <select name="pengalaman_kerja" required>
                <option value="Tidak Pernah">Tidak Pernah</option>
                <option value="Pernah">Pernah</option>
            </select>
            <button type="submit" class="button">Kirim</button>
        </form>
    </div>
</body>
</html>