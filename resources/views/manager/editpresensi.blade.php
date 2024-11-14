<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Presensi Pegawai</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('css/style_presensi.css') }}" /> --}}
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-image: url("{{ asset('img/dash.png') }}");

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
        input[type="file"] {
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
    </style>
</head>

<body>
    <form action="{{ route('presensi.update', $presensi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="container">
            <h2>Edit Presensi Pegawai</h2>

            <div class="form-group">
                <label for="nama">Nama Pegawai</label>
                <select id="nama" name="nama">
                    <option value="Ferdy" {{ $presensi->nama_pegawai == 'Ferdy' ? 'selected' : '' }}>Ferdy</option>
                    <option value="Mado" {{ $presensi->nama_pegawai == 'Mado' ? 'selected' : '' }}>Mado</option>
                    <option value="Juliano" {{ $presensi->nama_pegawai == 'Juliano' ? 'selected' : '' }}>Juliano</option>
                    <option value="Rio" {{ $presensi->nama_pegawai == 'Rio' ? 'selected' : '' }}>Rio</option>
                </select>
            </div>

            <div class="form-group">
                <label for="kehadiran">Kehadiran</label>
                <select id="kehadiran" name="kehadiran">
                    <option value="Hadir" {{ $presensi->kehadiran == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                    <option value="Sakit" {{ $presensi->kehadiran == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                    <option value="Absent" {{ $presensi->kehadiran == 'Absent' ? 'selected' : '' }}>Absent</option>
                    <option value="Ijin" {{ $presensi->kehadiran == 'Ijin' ? 'selected' : '' }}>Ijin</option>
                </select>
            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan Ijin</label>
                <textarea id="keterangan" name="keterangan" rows="4">{{ $presensi->keterangan }}</textarea>
            </div>

            <div class="form-group">
                <label for="upload">Upload Surat Keterangan Sakit</label>
                <input type="file" id="upload" name="upload">

                @if($presensi->upload)
                    <p>File saat ini: <a href="{{ route('presensi.file', $presensi->id) }}" target="_blank">Lihat File</a></p>
                @endif
            </div>

            <div class="form-group d-flex">
                <a href="{{ route('manager.viewpresensi') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </div>
    </form>
</body>

</html>
