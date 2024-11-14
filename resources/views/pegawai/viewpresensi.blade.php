<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Presensi Pegawai</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/da.css') }}">
    <style>
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 1000px;
            margin: 50px auto;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
            font-size: 1.5em;
        }

        table {
            width: 100%;
            margin-bottom: 20px;
        }

        th, td {
            padding: 3px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            font-size: 0.8em;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .btn {
            background-color: #5eb1e6;
            color: white;
            padding: 5px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 50px;
            margin: 5px;
            font-size: 0.8em;
        }

        .btn:hover {
            background-color: #007bff;
        }

        .btn-secondary {
            background-color: #f44336;
            color: white;
            width: 80px;
        }

        .btn-secondary:hover {
            background-color: #e53935;
        }

        .alert {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
        }

        .alert-info {
            background-color: #d1ecf1;
            color: #0c5460;
        }

        .d-flex {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>

<body>
    @include('template.sidebarpegawai')
    <div class="dashboard-content">  
        <div class="container mt-5">
            <h2 class="text-center mb-4">Daftar Presensi Pegawai</h2>
    
            <!-- Menampilkan pesan sukses jika ada -->
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
    
            <!-- Memeriksa apakah ada data presensi -->
            @if ($presensis->count() > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pegawai</th>
                        <th>Kehadiran</th>
                        <th>Keterangan</th>
                        <th>Surat Keterangan Sakit</th>
                        <th>Tanggal Presensi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($presensis as $presensi)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $presensi->nama_pegawai }}</td>
                        <td>{{ $presensi->kehadiran }}</td>
                        <td>{{ $presensi->keterangan ?? '-' }}</td>
                        <td>
                            @if ($presensi->upload)
                            <a href="{{ route('presensi.file', $presensi->id) }}" target="_blank">Lihat File</a>
                            @else
                            Tidak ada file
                            @endif
                        </td>
                        <td>{{ $presensi->created_at->format('d-m-Y H:i') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="alert alert-info text-center">
                Tidak ada data presensi yang tersedia.
            </div>
            @endif
            <a href="{{ route('pegawai.dashboard') }}" class="btn btn-secondary">Back</a>
        </div>    
    </div>
    
</body>

</html>
