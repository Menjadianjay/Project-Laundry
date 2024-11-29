<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Presensi Pegawai</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/da.css') }}">
    <style>
        .container {
            background-color: #fff;
            padding: 30px; /* Padding yang lebih besar */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 1000px; /* Ukuran lebar container */
            margin: 50px auto; /* Margin yang lebih kecil */
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
            font-size: 1.5em; /* Ukuran font lebih kecil */
        }

        table {
            width: 100%;
            margin-bottom: 20px;
        }

        th, td {
            padding: 3px; /* Padding yang lebih kecil */
            text-align: center;
            border-bottom: 1px solid #ddd;
            font-size: 0.8em; /* Ukuran font lebih kecil */
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .btn {
            background-color: #5eb1e6;
            color: white;
            padding: 5px; /* Padding yang lebih kecil */
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 50px; /* Ukuran lebar tombol lebih kecil */
            margin: 5px;
            font-size: 0.8em; /* Ukuran font tombol lebih kecil */
        }

        .btn:hover {
            background-color: #007bff;
        }

        .btn-secondary {
            background-color: #f44336;
            color: white;
            width: 80px; /* Ukuran lebar tombol lebih kecil */
        }

        .btn-secondary:hover {
            background-color: #e53935;
        }

        .btn-actions {
            display: flex;
            gap: 1px; /* Jarak antar tombol yang lebih kecil */
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
    @include('template.sidebarmanager')
    <div class="dashboard-content">
        <div class="container">
            <h2>Daftar Presensi Pegawai</h2>

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
                        <th>Aksi</th>
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
                        <td class="btn-actions">
                            <!-- Tombol Edit -->
                            <a href="{{ route('presensi.edit', $presensi->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        
                            <!-- Tombol Hapus -->
                            <form action="{{ route('presensi.destroy', $presensi->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-secondary btn-sm" style="background-color: #e53935; color: white;" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="alert alert-info text-center">
                Tidak ada data presensi yang tersedia.
            </div>
            @endif

            <div class="btn-group">
                <a href="{{ route('manager.dashboard') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>    
    </div>

</body>

</html>
