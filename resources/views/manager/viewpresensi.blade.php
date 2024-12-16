<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Presensi Pegawai</title>

    <!-- Menambahkan link font dan icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Menyertakan CSS lokal -->
    <link rel="stylesheet" href="{{ asset('css/da.css') }}">

    <style>
        /* Reset margin dan padding untuk memastikan elemen fullscreen */
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        /* Gaya dasar untuk body */
        body {
            background-image: url("{{ asset('img/dash.png') }}");
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full viewport height */
            font-family: 'Poppins', sans-serif; /* Menambahkan font Poppins */
        }

       /* Container styling */
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 95%; /* Increased from 90% */
            max-width: 1200px; /* Increased from 800px */
            text-align: center;
            position: absolute;
            top: 50%;
            left: 60%;
            transform: translate(-50%, -50%);
            z-index: 1;
            overflow-x: auto;
        }

        /* Table container */
        .table-container {
            width: 100%;
            margin-bottom: 20px;
        }

        /* Table styling */
        table {
            width: 120%;
            table-layout: fixed;
            margin-bottom: 0;
        }

        /* Column widths */
        table th:nth-child(1),
        table td:nth-child(1) { /* No */
            width: 5%;
        }

        table th:nth-child(2),
        table td:nth-child(2) { /* Nama Pegawai */
            width: 15%;
        }

        table th:nth-child(3),
        table td:nth-child(3) { /* Kehadiran */
            width: 10%;
        }

        table th:nth-child(4),
        table td:nth-child(4) { /* Keterangan */
            width: 35%;
        }

        table th:nth-child(5),
        table td:nth-child(5) { /* Surat Keterangan */
            width: 15%;
        }

        table th:nth-child(6),
        table td:nth-child(6) { /* Tanggal */
            width: 20%;
        }
        table th:nth-child(7),
        table td:nth-child(7) { /* aksi */
            width: 150px;
            min-width: 150px ;
        }

        /* Cell styling */
        td, th {
            padding: 12px; /* Increased padding */
            text-align: center;
            border-bottom: 1px solid #ddd;
            font-size: 0.9em;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        /* Tombol */
        .btn {
            background-color: #5eb1e6;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.8em;
            text-align: center;
            width: auto;
            margin: 10px;
        }

        .btn:hover {
            background-color: #007bff;
        }

        /* Tombol dengan warna sekunder (merah) */
        .btn-secondary {
            background-color: #f44336;
            color: white;
            padding: 5px 10px;
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

        /* Flexbox untuk layout */
        .d-flex {
            display: flex;
            justify-content: space-between;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            margin-bottom: 5px;
            align-items: center;
        }

        .pagination a {
            color: #007bff;
            padding: 8px 16px;
            text-decoration: none;
            border: 1px solid #ddd;
            margin: 0 5px;
            min-width: 10px;
            height: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
        }

        .pagination a:hover {
            background-color: #f2f2f2;
        }

        .pagination .active {
            background-color: #007bff;
            color: white;
        }

        /* Media query untuk perangkat kecil (smartphone) */
        @media (max-width: 768px) {
            /* Container menjadi lebih kecil */
            .container {
                width: 90%;
                padding: 10px;
            }

            /* Tabel menjadi scrollable */
            .table-container {
                overflow-x: auto;
            }

            table {
                font-size: 0.8em;
            }

            /* Ubah font ukuran lebih kecil */
            td, th {
                padding: 8px;
                font-size: 0.75em;
            }

            /* Elemen tombol lebih rapat */
            .btn {
                padding: 5px;
                font-size: 0.75em;
            }

            /* Atur pagination */
            .pagination a {
                padding: 6px 10px;
                font-size: 0.7em;
            }

            /* Sidebar dan konten dashboard */
            .dashboard-content {
                padding: 0;
            }

            .alert {
                font-size: 0.85em;
            }
        }

        /* Media query untuk perangkat sangat kecil (layar < 480px) */
        @media (max-width: 480px) {
            .container {
                padding: 5px;
            }

            table {
                font-size: 0.7em;
            }

            td, th {
                padding: 6px;
                font-size: 0.65em;
            }

            .btn {
                padding: 4px;
                font-size: 0.65em;
            }

            .pagination a {
                padding: 4px 8px;
                font-size: 0.6em;
            }

            h2 {
                font-size: 1.2em;
            }
        }
    </style>
</head>

<body>
    @include('template.sidebarmanager')

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
            <div class="pagination">
                @for ($i = 1; $i <= $presensis->lastPage(); $i++)
                    <a href="{{ $presensis->url($i) }}" class="{{ $presensis->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a>
                @endfor
            </div>
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
