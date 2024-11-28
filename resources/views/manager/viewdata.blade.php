{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Transaksi Laundry</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/da.css') }}">
    <style>
        .container {
            background-color: #fff;
            padding: 30px; /* Ubah padding untuk memperkecil ukuran container */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 1000px; /* Ukuran lebar container */
            margin: 50px auto;
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
            padding: 3px; /* Ubah padding untuk memperkecil ukuran sel */
            text-align: left;
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
            padding: 5px; /* Ubah padding untuk memperkecil ukuran tombol */
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 80px; /* Ukuran lebar tombol lebih kecil */
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
            gap: 5px; /* Ubah jarak antar tombol */
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
    </style>
</head>

<body>
    @include('template.sidebarmanager')
    <div class="dashboard-content">
        <div class="container ">
            <h2>View Transaksi Laundry</h2>
            
            <!-- Memeriksa apakah ada data transaksi -->
            @if ($transactions->count() > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Masuk</th>
                        <th>Nama Pelanggan</th>
                        <th>Jenis Layanan</th>
                        <th>Jenis Laundry</th>
                        <th>Berat (kg)</th>
                        <th>Metode Pembayaran</th>
                        <th>Total Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $transaction->tanggal_masuk }}</td>
                        <td>{{ $transaction->nama_pelanggan }}</td>
                        <td>{{ $transaction->jenis_layanan }}</td>
                        <td>{{ $transaction->jenis_laundry }}</td>
                        <td>{{ $transaction->berat }}</td>
                        <td>{{ $transaction->metode_pembayaran }}</td>
                        <td>Rp {{ $transaction->total_harga }}</td>
                        <td class="btn-actions">
                            <a href="{{ route('manager.editdata', ['id' => $transaction->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('manager.delete', ['id' => $transaction->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            @else
            <div class="alert alert-info text-center">
                Tidak ada data transaksi yang tersedia.
            </div>
            @endif
            <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="{{ route('manager.dashboard') }}" class="btn btn-secondary">Back</a>
            </div>
    
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>      
    </div>
    
</body>

</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Transaksi Laundry</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/da.css') }}">
<style>
    .container {
        background-color: #fff;
        padding: 20px; /* Ubah padding container */
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: auto; /* Lebar container lebih kecil */
        margin: 30px auto; /* Ubah margin */
    }

    h2 {
        font-size: 1.3em; /* Ukuran font lebih kecil */
    }

    table {
        width: 100%;
        margin-bottom: 10px;
    }

    th, td {
        padding: 5px; /* Kurangi padding sel tabel */
        text-align: left;
        border-bottom: 1px solid #ddd;
        font-size: 0.57em; /* Ukuran font lebih kecil */
        white-space: nowrap; /* Teks tetap dalam satu baris */
    }

    th {
        background-color: #f7f7f7;
        font-weight: bold;
    }

    .btn {
        padding: 3px; /* Kurangi padding tombol */
        font-size: 0.7em; /* Ukuran font tombol lebih kecil */
        width: 60px; /* Lebar tombol lebih kecil */
    }

    .btn-actions {
        display: flex;
        gap: 3px; /* Kurangi jarak antar tombol */
    }

    .alert {
        padding: 8px; /* Kurangi padding alert */
        font-size: 0.8em; /* Ukuran font alert lebih kecil */
    }

    .alert-info {
        background-color: #e8f4fa;
        color: #31708f;
    }
</style>

</head>
<body>
    @include('template.sidebarmanager')
    <div class="dashboard-content">
        <div class="container">
            <h2>View Transaksi Laundry</h2>

            @if ($transactions->count() > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Masuk</th>
                        <th>Nama Pelanggan</th>
                        <th>No Telp</th>
                        <th>Alamat</th>
                        <th>Jenis Layanan</th>
                        <th>Jenis Laundry</th>
                        <th>Durasi Layanan</th>
                        <th>Berat (kg)</th>
                        <th>Metode Pembayaran</th>
                        <th>Total Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $transaction->tanggal_masuk }}</td>
                        <td>{{ $transaction->pelanggan->nama }}</td>
                        <td>{{ $transaction->pelanggan->no_telp }}</td>
                        <td>{{ $transaction->pelanggan->alamat }}</td>
                        <td>{{ $transaction->laundry->jenis_layanan }}</td>
                        <td>{{ $transaction->laundry->jenis_laundry }}</td>
                        <td>{{ $transaction->laundry->durasi_layanan }}</td>
                        <td>{{ $transaction->berat }}</td>
                        <td>{{ $transaction->metode_pembayaran }}</td>
                        <td>Rp {{ number_format($transaction->total_harga, 2, ',', '.') }}</td>
                        <td class="btn-actions">
                            <a href="{{ route('manager.editdata', ['id' => $transaction->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('manager.delete', ['id' => $transaction->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="alert alert-info text-center">
                Tidak ada data transaksi yang tersedia.
            </div>
            @endif
            <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="{{ route('manager.dashboard') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </div>
</body>
</html>
