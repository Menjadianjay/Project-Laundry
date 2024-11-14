<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Transaksi Laundry</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/da.css') }}">
    <style>
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 500px;
            text-align: center;
            margin: 50px auto;
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
            width: 45%;
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

        .form-check-label {
            margin-left: 5px;
        }

        .form-check {
            display:inline-flex;
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
    @include('template.sidebarpegawai')
    <div class="dashboard-content">
        <div class="container">
            <h3>Form Transaksi Laundry</h3>
            <form action="{{ route('pegawai.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="tanggalMasuk">Tanggal Masuk:</label>
                    <input type="date" id="tanggalMasuk" name="tanggalMasuk" required>
                </div>
                <div class="form-group">
                    <label for="namaPelanggan">Nama Pelanggan:</label>
                    <input type="text" id="namaPelanggan" name="namaPelanggan" placeholder="Masukkan nama pelanggan" required>
                </div>
                <div class="form-group">
                    <label for="jenisLayanan">Jenis Layanan:</label>
                    <select id="jenisLayanan" name="jenisLayanan" required>
                        <option value="" disabled selected>Pilih jenis layanan</option>
                        <option value="Cuci setrika">Cuci Setrika</option>
                        <option value="Cuci lipat">Cuci Lipat</option>
                        <option value="Setrika saja">Setrika Saja</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="jenisLaundry">Jenis Laundry:</label>
                    <select id="jenisLaundry" name="jenisLaundry" required>
                        <option value="" disabled selected>Pilih jenis laundry</option>
                        <option value="Express">Express</option>
                        <option value="2 hari">2 Hari</option>
                        <option value="3 hari">3 Hari</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="berat">Berat (kg):</label>
                    <input type="number" id="berat" name="berat" placeholder="Masukkan berat laundry" required>
                </div>
                <div class="form-group">
                    <label>Metode Pembayaran:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="cash" name="metodePembayaran" value="cash" required>
                        <label class="form-check-label" for="cash">Cash</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="transfer" name="metodePembayaran" value="transfer" required>
                        <label class="form-check-label" for="transfer">Transfer</label>
                    </div>
                </div>
                <div class="form-group d-flex">
                    <button type="button" class="btn btn-secondary" onclick="window.location.href='{{ Auth::user()->name === 'pegawai' ? route('manager.dashboard') : route('pegawai.dashboard') }}'">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Transaksi</button>                
                </div>
            </form>
        </div>       
    </div>
    

</body>

</html>
