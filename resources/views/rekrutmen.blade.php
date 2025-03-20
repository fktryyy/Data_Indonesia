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
            <input type="hidden" name="job_id" id="job_id" value="">
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    let jobId = localStorage.getItem('selectedJobId');
                    if (jobId) {
                        document.getElementById('job_id').value = jobId;
                    }
                });
            </script>            
            <input type="hidden" name="stage_id" value="1">
            <input type="hidden" name="name" value="Rekrutmen">
            <div id="step-1" class="step">
                <h4 class="mb-3">Personal</h4>
                <div class="row">       
                    <div class="col-md-6 mb-3">
                        <label for="partner_name" class="form-label">Nama  <span style="color: red;">(wajib!)</span></label>
                        <input type="text" class="form-control" id="partner_name" name="partner_name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="no_ktp" class="form-label">No KTP <span style="color: red;">(wajib!)</span></label>
                        <input type="text" class="form-control" id="no_ktp" name="no_ktp" required maxlength="16" oninput="validateKTP(this)">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="email_from" class="form-label">Email <span style="color: red;">(wajib!)</span></label>
                        <input type="email" class="form-control" id="email_from" name="email_from" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin <span style="color: red;">(wajib!)</span></label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="0">Laki-laki</option>
                            <option value="1">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nama_ibu" class="form-label">Nama Ibu <span style="color: red;">(wajib!)</span></label>
                        <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="partner_mobile" class="form-label">Nomor HP <span style="color: red;">(wajib!)</span></label>
                        <input type="text" class="form-control" id="partner_mobile" name="partner_mobile" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir <span style="color: red;">(wajib!)</span></label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir <span style="color: red;">(wajib!)</span></label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                    </div>
                </div>
                
                
                <div class="col-md-6 mb-3">
                    <label for="alamat" class="form-label">Alamat Lengkap <span style="color: red;">(wajib!)</span></label>
                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                </div>
                <div class="row">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="provinsi" class="form-label">Provinsi <span style="color: red;">(wajib!)</span></label>
                            <select class="form-control select2" id="provinsi" required></select>
                            <input type="hidden" id="selected_provinsi" name="provinsi">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="kabupaten" class="form-label">Kabupaten <span style="color: red;">(wajib!)</span></label>
                            <select class="form-control select2" id="kabupaten" required></select>
                            <input type="hidden" id="selected_kabupaten" name="kabupaten">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="kecamatan" class="form-label">Kecamatan <span style="color: red;">(wajib!)</span></label>
                            <select class="form-control select2" id="kecamatan" required></select>
                            <input type="hidden" id="selected_kecamatan" name="kecamatan">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="kelurahan" class="form-label">Kelurahan <span style="color: red;">(wajib!)</span></label>
                            <select class="form-control select2" id="kelurahan" required></select>
                            <input type="hidden" id="selected_kelurahan" name="kelurahan">
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="status_pernikahan" class="form-label">Status Pernikahan <span style="color: red;">(wajib!)</span></label>
                        <select class="form-control" id="status_pernikahan" name="status_pernikahan" required>
                            <option value="0">Menikah</option>
                            <option value="1">Belum Menikah</option>
                            <option value="2">Cerai Hidup</option>
                            <option value="3">Cerai Mati</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="jumlah_anak" class="form-label">Jumlah Anak <span style="color: red;">(isikan 0 jika belum punya anak)</span></label>
                        <input type="number" class="form-control" id="jumlah_anak" name="jumlah_anak" placeholder="0" required>
                    </div>
                </div>
                    <div class="col-md-6 mb-3">
                        <label for="tinggi_badan" class="form-label">Tinggi Badan (cm) <span style="color: red;">(wajib!)</span></label>
                        <input type="number" class="form-control" id="tinggi_badan" name="tinggi_badan" required>
                    </div>
                <button type="button" class="btn btn-primary" onclick="nextStep(2)">Next</button>
            </div>
        

            <div id="step-2" class="step d-none">
                <h4 class="mb-3">Pendidikan</h4>
                <div class="mb-3">
                    <label for="type_id" class="form-label">Jenjang <span style="color: red;">(wajib!)</span></label>
                    <select class="form-control" id="type_id" name="type_id" required>
                        <option value="1">SMA</option>
                        <option value="2">S1</option>
                        <option value="3">S2</option>
                        <option value="4">S3</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nama_sekolah" class="form-label">Sekolah/Universitas <span style="color: red;">(wajib!)</span></label>
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
                    <input class="form-check-input" type="checkbox" id="experience" name="experience" value="1" onclick="toggleExperienceForm()">
                    <label class="form-check-label" for="experience">Pengalaman kerja di perusahaan lain</label>
                </div>
                
                <div id="experience-form" class="d-none">
                    <div class="mb-3">
                        <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                        <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan">
                    </div>
                    <div class="mb-3">
                        <label for="posisi" class="form-label">Posisi</label>
                        <input type="text" class="form-control" id="posisi" name="posisi">
                    </div>
                    <div class="mb-3">
                        <label for="lama" class="form-label">Lama Bekerja</label>
                        <input type="text" class="form-control" id="lama" name="lama">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi Pekerjaan</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
                    </div>
                </div>
                
                <button type="button" class="btn btn-secondary" onclick="prevStep(2)">Previous</button>
                <button type="button" class="btn btn-primary" onclick="nextStep(4)">Next</button>
            </div>
            
            <script>
                function toggleExperienceForm() {
                    let experienceForm = document.getElementById('experience-form');
                    let experienceCheckbox = document.getElementById('experience');
                    
                    if (experienceCheckbox.checked) {
                        experienceForm.classList.remove('d-none');
                    } else {
                        experienceForm.classList.add('d-none');
                    }
                }
            </script>
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
        function confirmData() {
            let data = {
                'Job ID': document.querySelector('input[name="job_id"]').value,
                'Stage ID': document.querySelector('input[name="stage_id"]').value,
                'Nama': document.getElementById('partner_name').value,
                'No KTP': document.getElementById('no_ktp').value,
                'Email': document.getElementById('email_from').value,
                'Jenis Kelamin': document.getElementById('jenis_kelamin').selectedOptions[0].text, 
                'Nama Ibu': document.getElementById('nama_ibu').value,
                'Nomor HP': document.getElementById('partner_mobile').value,
                'Tempat Lahir': document.getElementById('tempat_lahir').value,
                'Tanggal Lahir': document.getElementById('tanggal_lahir').value,
                'Alamat Lengkap': document.getElementById('alamat').value,
                'Provinsi': $('#provinsi option:selected').text(),
                'Kabupaten': $('#kabupaten option:selected').text(),
                'Kecamatan': $('#kecamatan option:selected').text(),
                'Kelurahan': $('#kelurahan option:selected').text(),
                'Status Pernikahan': document.getElementById('status_pernikahan').selectedOptions[0].text, 
                'Jumlah Anak': document.getElementById('jumlah_anak').value,
                'Tinggi Badan': document.getElementById('tinggi_badan').value,
                'Jenjang Pendidikan': document.getElementById('type_id').selectedOptions[0].text, 
                'Nama Sekolah/Universitas': document.getElementById('nama_sekolah').value,
                'Pernah Bekerja di PT. SSM': document.getElementById('existing').checked ? 'Ya' : 'Tidak',
                'Pengalaman Kerja di Perusahaan Lain': document.getElementById('experience').checked ? 'Ya' : 'Tidak'
            };
            
            if (document.getElementById('experience').checked) {
                data['Nama Perusahaan'] = document.getElementById('nama_perusahaan').value;
                data['Posisi'] = document.getElementById('posisi').value;
                data['Lama Bekerja'] = document.getElementById('lama').value;
                data['Deskripsi Pekerjaan'] = document.getElementById('deskripsi').value;
            }
    
            let confirmationList = document.getElementById('confirmation-list');
            confirmationList.innerHTML = '';
            
            for (let key in data) {
                let li = document.createElement('li');
                li.textContent = `${key}: ${data[key]}`;
                confirmationList.appendChild(li);
            }
        }
    </script>
    
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
        
        
    </script>
     <script>
        $(document).ready(function() {
    // Ambil daftar provinsi
    $.getJSON("https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json", function(data) {
        let options = '<option value="">Pilih Provinsi</option>';
        $.each(data, function(index, item) {
            options += `<option value="${item.id}" data-name="${item.name}">${item.name}</option>`;
        });
        $('#provinsi').html(options);
    });

    // Ketika provinsi dipilih
    $('#provinsi').change(function() {
        let provinsiID = $(this).val();
        let provinsiName = $(this).find(':selected').data('name');
        $('#selected_provinsi').val(provinsiName); // Simpan nama provinsi

        if (provinsiID) {
            $.getJSON(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinsiID}.json`, function(data) {
                let options = '<option value="">Pilih Kabupaten</option>';
                $.each(data, function(index, item) {
                    options += `<option value="${item.id}" data-name="${item.name}">${item.name}</option>`;
                });
                $('#kabupaten').html(options);
            });
        }
    });

    // Ketika kabupaten dipilih
    $('#kabupaten').change(function() {
        let kabupatenID = $(this).val();
        let kabupatenName = $(this).find(':selected').data('name');
        $('#selected_kabupaten').val(kabupatenName); // Simpan nama kabupaten

        if (kabupatenID) {
            $.getJSON(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${kabupatenID}.json`, function(data) {
                let options = '<option value="">Pilih Kecamatan</option>';
                $.each(data, function(index, item) {
                    options += `<option value="${item.id}" data-name="${item.name}">${item.name}</option>`;
                });
                $('#kecamatan').html(options);
            });
        }
    });

    // Ketika kecamatan dipilih
    $('#kecamatan').change(function() {
        let kecamatanID = $(this).val();
        let kecamatanName = $(this).find(':selected').data('name');
        $('#selected_kecamatan').val(kecamatanName); // Simpan nama kecamatan

        if (kecamatanID) {
            $.getJSON(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${kecamatanID}.json`, function(data) {
                let options = '<option value="">Pilih Kelurahan</option>';
                $.each(data, function(index, item) {
                    options += `<option value="${item.name}" data-name="${item.name}">${item.name}</option>`;
                });
                $('#kelurahan').html(options);
            });
        }
    });

    // Simpan nama kelurahan saat dipilih
    $('#kelurahan').change(function() {
        let kelurahanName = $(this).find(':selected').data('name');
        $('#selected_kelurahan').val(kelurahanName);
    });
});

    </script>
    </div>
</form>
</body>
</html>