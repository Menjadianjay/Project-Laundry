<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Layanan Laundry</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/da.css') }}">
    <style>
        .container {
            background-color: #ffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 5 0 10px rgba(0, 0, 0, 0.1);
            width: 500px;
            text-align: center;
            margin: 0 auto;
            margin-top: 50px;
        }

        h2 {
            color: black;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            text-align: left;
        }

        input[type="text"],
        input[type="number"],
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

        .btn-batal {
            background-color: #f44336;
            color: white;
        }

        .btn-batal:hover {
            background-color: #e53935;
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
    @include('template.sidebarmanager')
    <div class="dashboard-content">
        <div class="container">
            <h2>Input Jenis dan Tarif Layanan Laundry</h2>
            <form action="{{ route('manager.storelayanan') }}" method="POST">
                @csrf <!-- Tambahkan CSRF token untuk keamanan -->
                
                <div class="form-group">
                    <label>Jenis Laundry:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="kiloan" name="jenis_laundry" value="kiloan" required>
                        <label class="form-check-label" for="kiloan">Kiloan</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="satuan" name="jenis_laundry" value="satuan" required>
                        <label class="form-check-label" for="satuan">Satuan</label>
                    </div>
                </div>

                <label for="jenis_layanan">Jenis Layanan:</label>
                <input type="text" id="jenis_layanan" name="jenis_layanan" placeholder="Masukkan jenis layanan (contoh: Cuci Kering)" required>

                <div>
                    <label for="durasi_layanan">Durasi Layanan:</label>
                    <select id="durasi_layanan" name="durasi_layanan" required>
                        <option value="" disabled selected>Pilih Durasi Laundry</option>
                        <option value="Express">Express</option>
                        <option value="Kilat">Kilat</option>
                        <option value="Reguler">Reguler</option>
                    </select>
                </div>

                <label for="tarif_layanan">Tarif Layanan:</label>
                <input type="number" id="tarif_layanan" name="tarif_layanan" placeholder="Masukkan Tarif layanan (contoh: 5000)" required>

                <div class="form-group d-flex">
                    <button type="button" class="btn btn-batal" onclick="window.location.href='{{ route('manager.dashboard') }}'">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>                
                </div>
            </form>
        </div>      
    </div>
</body>
</html>
