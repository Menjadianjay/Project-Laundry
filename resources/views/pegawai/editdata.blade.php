<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaksi Laundry</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/da.css') }}">
    <style>
        body {
            background-image: url("{{ asset('img/dash.png') }}");
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 500px;
            margin: 50px auto;
            text-align: center;
        }

        h3 {
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            text-align: left;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        select {
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
            width: 30%;
        }

        button:hover {
            background-color: #007bff;
        }

        .btn-secondary {
            background-color: #f44336;
            color: white;
            width: 15%;
            text-align: center;
            border-radius: 4px;
            padding: 10px;
        }

        .btn-secondary:hover {
            background-color: #e53935;
        }

        .form-check-label {
            margin-left: 5px;
        }

        .form-check {
            display: inline-flex;
            margin-right: 10px;
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
        <div class="container">
            <h3>Edit Transaksi Laundry</h3>
            <form action="{{ route('pegawai.update', $transaction->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="tanggalMasuk">Tanggal Masuk</label>
                    <input type="date" class="form-control" id="tanggalMasuk" name="tanggalMasuk" required value="{{ $transaction->tanggal_masuk }}">
                </div>
                <div class="form-group">
                    <label for="namaPelanggan">Nama Pelanggan</label>
                    <input type="text" class="form-control" id="namaPelanggan" name="namaPelanggan" placeholder="Masukkan nama pelanggan" required value="{{ $transaction->nama_pelanggan }}">
                </div>
                <div class="form-group">
                    <label for="jenisLayanan">Jenis Layanan</label>
                    <select class="form-control" id="jenisLayanan" name="jenisLayanan" required>
                        <option value="" disabled>Pilih jenis layanan</option>
                        <option value="Cuci setrika" {{ $transaction->jenis_layanan == 'Cuci setrika' ? 'selected' : '' }}>Cuci Setrika</option>
                        <option value="Cuci lipat" {{ $transaction->jenis_layanan == 'Cuci lipat' ? 'selected' : '' }}>Cuci Lipat</option>
                        <option value="Setrika saja" {{ $transaction->jenis_layanan == 'Setrika saja' ? 'selected' : '' }}>Setrika Saja</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="jenisLaundry">Jenis Laundry</label>
                    <select class="form-control" id="jenisLaundry" name="jenisLaundry" required>
                        <option value="" disabled>Pilih jenis laundry</option>
                        <option value="Express" {{ $transaction->jenis_laundry == 'Express' ? 'selected' : '' }}>Express</option>
                        <option value="2 hari" {{ $transaction->jenis_laundry == '2 hari' ? 'selected' : '' }}>2 Hari</option>
                        <option value="3 hari" {{ $transaction->jenis_laundry == '3 hari' ? 'selected' : '' }}>3 Hari</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="berat">Berat (kg)</label>
                    <input type="number" class="form-control" id="berat" name="berat" placeholder="Masukkan berat laundry" required value="{{ $transaction->berat }}">
                </div>
                <div class="form-group">
                    <label>Metode Pembayaran</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="metodePembayaran" id="cash" value="cash" {{ $transaction->metode_pembayaran == 'cash' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="cash">Cash</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="metodePembayaran" id="transfer" value="transfer" {{ $transaction->metode_pembayaran == 'transfer' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="transfer">Transfer</label>
                    </div>
                </div>
                <div class="form-group d-flex">
                    <a href="{{ route('pegawai.viewdata') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
</body>

</html>
