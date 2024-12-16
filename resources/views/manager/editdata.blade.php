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
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
            overflow-x: hidden;
        }

        body {
            background-image: url("{{ asset('img/dash.png') }}");
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background-color: #ffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 500px;
            text-align: center;
            margin: 20px;
            position: relative;
            left: auto;
            top: auto;
            transform: none;
        }

        h3 {
            color: #333;
            margin-bottom: 20px;
            font-size: clamp(1.2rem, 2.5vw, 1.5rem);
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 5px;
            text-align: left;
            font-size: clamp(0.9rem, 2vw, 1rem);
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: clamp(0.9rem, 2vw, 1rem);
        }

        /* Radio buttons container */
        .form-group .form-check {
            display: inline-flex;
            align-items: center;
            margin-right: 15px;
            margin-bottom: 10px;
        }

        .form-check-input {
            margin-right: 5px;
        }

        .form-check-label {
            font-size: clamp(0.9rem, 2vw, 1rem);
        }

        /* Buttons container */
        .form-group.d-flex {
            display: flex;
            gap: 10px;
            justify-content: flex-start;
            align-items: center;
            flex-wrap: wrap;
        }

        button, .btn-secondary {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: clamp(0.9rem, 2vw, 1rem);
            min-width: 100px;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        button {
            background-color: #5eb1e6;
            color: white;
        }

        button:hover {
            background-color: #007bff;
        }

        .btn-secondary {
            background-color: #f44336;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #e53935;
        }

        /* Media Queries */
        @media screen and (max-width: 768px) {
            .container {
                width: 95%;
                padding: 15px;
                margin: 10px;
            }

            .form-group.d-flex {
                justify-content: center;
            }

            button, .btn-secondary {
                width: 45%;
                min-width: auto;
            }
        }

        @media screen and (max-width: 480px) {
            .container {
                padding: 10px;
                margin: 5px;
            }

            .form-check {
                display: block;
                margin-bottom: 5px;
            }

            button, .btn-secondary {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>
</head>

<body>
        @include('template.sidebarmanager')
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
                    <input type="text" class="form-control" id="namaPelanggan" name="namaPelanggan" required value="{{ $transaction->pelanggan->nama }}">
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
                    <a href="{{ route('manager.viewdata') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
</body>

</html>
