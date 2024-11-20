<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Layanan Laundry</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/da.css') }}">
    <style>
        .container {
            background-color: #ffff;
            padding: 100px;
            border-radius: 8px;
            box-shadow: 5 0 10px rgba(0, 0, 0, 0.1);
            width: 800px;
            text-align: center;
            margin: 0 auto;
            margin-top: 50px;
        }

        h2 {
            color: black;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            width: 900px;
            margin-left: -50px;
        }

        th {
            background-color: #5eb1e6;
            color: white;
        }

        td, th {
            text-align: left;
        }

        button,
        .btn-edit,
        .btn-hapus {
            background-color: #5eb1e6;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-hapus {
            background-color: #f44336;
        }

        .btn-secondary {
            background-color: #f44336;
            color: white;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            width: 15%;
        }
    </style>
</head>

<body>
    @include('template.sidebarmanager')
    <div class="dashboard-content">
        <div class="container">
            <h2>Daftar Jenis dan Tarif Layanan Laundry</h2>

            <!-- Tabel daftar layanan -->
            <table>
                <thead>
                    <tr>
                        <th>Jenis Layanan</th>
                        <th>Nama Layanan</th>
                        <th>Durasi Layanan</th>
                        <th>Tarif Layanan (Rp)</th>
                        <th>Keterangan</th> <!-- Tambahkan kolom Keterangan -->
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($laundries as $laundry)
                    <tr>
                        <td>{{ $laundry->jenis_laundry }}</td>
                        <td>{{ $laundry->jenis_layanan }}</td>
                        <td>{{ $laundry->durasi_layanan }}</td>
                        <td>Rp {{ number_format($laundry->tarif_layanan, 0, ',', '.') }}</td>
                        <td>{{ $laundry->keterangan }}</td> <!-- Tampilkan keterangan di sini -->
                        <td>
                            <a href="{{ route('manager.editlayanan', $laundry->id) }}" class="btn-edit">Edit</a>
                            <form action="{{ route('manager.deletelayanan', $laundry->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus layanan ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <br><br>
            <div>
                <a href="{{ route('manager.dashboard') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>      
    </div>
</body>
</html>

