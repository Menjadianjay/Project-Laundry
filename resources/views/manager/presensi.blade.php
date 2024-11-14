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
    @include('template.sidebarmanager')
    <div class="dashboard-content"> 
        <form action="{{ route('presensi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <h2>Input Presensi Pegawai</h2>
    
                <div class="form-group">
                    <label for="nama">Nama Pegawai</label>
                    <select id="nama" name="nama">
                        <option value="Ferdy">Ferdy</option>
                        <option value="Mado">Mado</option>
                        <option value="Juliano">Juliano</option>
                        <option value="Rio">Rio</option>
                    </select>
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
    
                <div class="form-group">
                    <label for="keterangan">Keterangan Ijin</label>
                    <textarea id="keterangan" name="keterangan" rows="4"></textarea>
                </div>
    
                <div class="form-group">
                    <label for="upload">Upload Surat Keterangan Sakit</label>
                    <input type="file" id="upload" name="upload">
                </div>
    
                <div class="form-group d-flex">
                    <a href="{{ route('manager.dashboard') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </div>
        </form>     
    </div>
    
</body>

</html>
