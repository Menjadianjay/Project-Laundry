<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Presensi Pegawai</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/da.css') }}">
    <style>
        /* Style CSS tetap sama */
        body {
            font-family: 'Poppins', sans-serif;
            background-image: url("{{ asset('img/dash.png') }}");
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 500px;
            text-align: center;
            margin: 50px auto;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            text-align: left;
        }
        select,
        textarea,
        input[type="file"],
        input[readonly] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #5eb1e6;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 25%;
        }
        button:hover {
            background-color: #007bff;
        }
        .btn-secondary {
            background-color: #f44336;
            color: white;
            text-align: center;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            width: 15%;
        }
        .btn-secondary:hover {
            background-color: #e53935;
        }
        .form-group {
            text-align: left;
        }
        .form-group.d-flex {
            justify-content: space-between;
            display: flex;
        }
        /* Untuk pesan error yang berada di atas tengah halaman */
        .alert {
            position: absolute;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            width: 90%;
            max-width: 600px;
            padding: 15px;
            border-radius: 5px;
            text-align: center;
            z-index: 999;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
        }
        .alert-success {
            background-color: #4CAF50;
            color: white;
        }
        .alert-danger {
            background-color: #f44336;
            color: white;
        }
        .alert-info {
            background-color: #2196F3;
            color: white;
        }

        /* Responsif untuk ukuran layar kecil */
        @media (max-width: 768px) {
            .container {
                width: 90%;
            }
            button {
                width: 50%;
            }
            .btn-secondary {
                width: 50%;
            }
        }
    </style>
</head>

<body>
    @include('template.sidebarpegawai')
    <div class="dashboard-content">

        <!-- Pesan alert di tengah atas -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if ($sudahPresensi)
            <div class="alert alert-info">
                Anda sudah melakukan presensi hari ini.
            </div>
        @else
            <form action="{{ route('presensi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="container">
                    <h2>Input Presensi Pegawai</h2>

                    <!-- Nama Pegawai (readonly, diisi otomatis dengan nama user login) -->
                    <div class="form-group">
                        <label for="nama">Nama Pegawai</label>
                        <input type="text" id="nama" name="nama" value="{{ Auth::user()->name }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="kehadiran">Kehadiran</label>
                        <select id="kehadiran" name="kehadiran">
                            <option value="Hadir">Hadir</option>
                            <option value="Sakit">Sakit</option>
                            <option value="Absent">Absent</option>
                            <option value="Ijin">Ijin</option>
                        </select>
                    </div>

                    <div class="form-group" id="keterangan-group" style="display: none;">
                        <label for="keterangan">Keterangan</label>
                        <textarea id="keterangan" name="keterangan" rows="4" class="form-control" placeholder="Masukkan keterangan"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="upload">Upload Surat Keterangan Sakit</label>
                        <input type="file" id="upload" name="upload">
                    </div>

                    <div class="form-group d-flex">
                        <a href="{{ route('pegawai.dashboard') }}" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </form>
        @endif
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const kehadiranSelect = document.getElementById("kehadiran");
            const keteranganGroup = document.getElementById("keterangan-group");

            function toggleKeterangan() {
                if (kehadiranSelect.value !== "Hadir") {
                    keteranganGroup.style.display = "block";
                } else {
                    keteranganGroup.style.display = "none";
                }
            }
            toggleKeterangan();

            kehadiranSelect.addEventListener("change", toggleKeterangan);
        });
    </script>
</body>

</html>
