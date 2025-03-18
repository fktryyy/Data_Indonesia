<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Rekrutmen Karyawan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Form Rekrutmen Karyawan</h2>
        <form action="{{ route('store') }}" method="POST" class="p-4 border rounded shadow-sm bg-light">
            @csrf
            <div id="step-1" class="step">
                <h4 class="mb-3">Personal</h4>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="partner_name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="partner_name" name="partner_name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="no_ktp" class="form-label">No KTP</label>
                        <input type="text" class="form-control" id="no_ktp" name="no_ktp" required maxlength="16" oninput="validateKTP(this)">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="email_from" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email_from" name="email_from" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nama_ibu" class="form-label">Nama Ibu</label>
                        <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="partner_mobile" class="form-label">Nomor HP</label>
                        <input type="text" class="form-control" id="partner_mobile" name="partner_mobile" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                    </div>
                </div>
                
                <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="status_pernikahan" class="form-label">Status Pernikahan</label>
                    <select class="form-control" id="status_pernikahan" name="status_pernikahan" required>
                        <option value="0">Menikah</option>
                        <option value="1">Belum Menikah</option>
                        <option value="2">Cerai Hidup</option>
                        <option value="3">Cerai Mati</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="jumlah_anak" class="form-label">Jumlah Anak</label>
                    <input type="number" class="form-control" id="jumlah_anak" name="jumlah_anak" placeholder="0" required>
                </div>
            </div>
                <div class="col-md-6 mb-3">
                    <label for="tinggi_badan" class="form-label">Tinggi Badan (cm)</label>
                    <input type="number" class="form-control" id="tinggi_badan" name="tinggi_badan" required>
                </div>
            
                <div class="col-md-6 mb-3">
                    <label for="alamat" class="form-label">Alamat Lengkap</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="provinsi" class="form-label">Provinsi</label>
                        <select class="form-control select2" id="provinsi" required></select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="kabupaten" class="form-label">Kabupaten</label>
                        <select class="form-control select2" id="kabupaten" required></select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="kecamatan" class="form-label">Kecamatan</label>
                        <select class="form-control select2" id="kecamatan" required></select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="kelurahan" class="form-label">Kelurahan</label>
                        <select class="form-control select2" id="kelurahan" required></select>
                    </div>
                </div>
                <button type="button" class="btn btn-primary" onclick="nextStep(2)">Next</button>
            </div>
        

            <div id="step-2" class="step d-none">
                <h4 class="mb-3">Pendidikan</h4>
                <div class="mb-3">
                    <label for="jenjang" class="form-label">Jenjang</label>
                    <select class="form-control" id="jenjang" name="jenjang" required>
                        <option value="0">SMA</option>
                        <option value="1">S1</option>
                        <option value="2">S2</option>
                        <option value="3">S3</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nama_sekolah" class="form-label">Sekolah/Universitas</label>
                    <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah" required>
                </div>
                <button type="button" class="btn btn-secondary" onclick="prevStep(1)">Previous</button>
                <button type="button" class="btn btn-primary" onclick="nextStep(3)">Next</button>
            </div>
            
            <div id="step-3" class="step d-none">
                <h4 class="mb-3">Pengalaman</h4>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="existing" name="existing" value="1">
                    <label class="form-check-label" for="existing">Pernah bekerja di PT. SSM</label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="experience" name="experience" value="1">
                    <label class="form-check-label" for="experience">Pengalaman kerja di perusahaan lain</label>
                </div>
                <button type="button" class="btn btn-secondary" onclick="prevStep(2)">Previous</button>
                <button type="button" class="btn btn-primary" onclick="nextStep(4)">Next</button>
            </div>
            
            <div id="step-4" class="step d-none">
                <h4 class="mb-3">Konfirmasi</h4>
                <p>Silakan periksa kembali data yang Anda masukkan:</p>
                <ul id="confirmation-list"></ul>
                <button type="button" class="btn btn-secondary" onclick="prevStep(3)">Previous</button>
                <button type="submit" class="btn btn-success">Kirim</button>
            </div>
        </form>
    </div>

    <script>
        function nextStep(step) {
            document.querySelectorAll('.step').forEach(el => el.classList.add('d-none'));
            document.getElementById('step-' + step).classList.remove('d-none');
            if (step === 4) {
                confirmData();
            }
        }
        
        function prevStep(step) {
            document.querySelectorAll('.step').forEach(el => el.classList.add('d-none'));
            document.getElementById('step-' + step).classList.remove('d-none');
        }
        
        function confirmData() {
            let confirmationList = document.getElementById('confirmation-list');
            confirmationList.innerHTML = '';
            let inputs = document.querySelectorAll('input, select');
            inputs.forEach(input => {
                if (input.type !== 'checkbox' || input.checked) {
                    let li = document.createElement('li');
                    li.textContent = `${input.previousElementSibling?.textContent || input.name}: ${input.value}`;
                    confirmationList.appendChild(li);
                }
            });
        }
    </script>
     <script>
        $(document).ready(function() {
            $('.select2').select2();

            // Load Provinsi
            $.getJSON("https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json", function(data) {
                let options = '<option value="">Pilih Provinsi</option>';
                $.each(data, function(index, item) {
                    options += `<option value="${item.id}">${item.name}</option>`;
                });
                $('#provinsi').html(options);
            });

            // Load Kabupaten
            $('#provinsi').change(function() {
                let provinsiID = $(this).val();
                if (provinsiID) {
                    $.getJSON(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinsiID}.json`, function(data) {
                        let options = '<option value="">Pilih Kabupaten</option>';
                        $.each(data, function(index, item) {
                            options += `<option value="${item.id}">${item.name}</option>`;
                        });
                        $('#kabupaten').html(options);
                    });
                }
            });

            // Load Kecamatan
            $('#kabupaten').change(function() {
                let kabupatenID = $(this).val();
                if (kabupatenID) {
                    $.getJSON(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${kabupatenID}.json`, function(data) {
                        let options = '<option value="">Pilih Kecamatan</option>';
                        $.each(data, function(index, item) {
                            options += `<option value="${item.id}">${item.name}</option>`;
                        });
                        $('#kecamatan').html(options);
                    });
                }
            });

            // Load Kelurahan
            $('#kecamatan').change(function() {
                let kecamatanID = $(this).val();
                if (kecamatanID) {
                    $.getJSON(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${kecamatanID}.json`, function(data) {
                        let options = '<option value="">Pilih Kelurahan</option>';
                        $.each(data, function(index, item) {
                            options += `<option value="${item.id}">${item.name}</option>`;
                        });
                        $('#kelurahan').html(options);
                    });
                }
            });
        });
    </script>
    </div>
</form>
</body>
</html>