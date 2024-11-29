<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Layanan Laundry</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('css/da.css') }}"> --}}
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
    
        h2 {
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
        select,
        textarea {
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
            width: 15%;
            text-align: center;
            border-radius: 4px;
            padding: 10px;
        }
    
        .btn-batal:hover {
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

        .btn-edit {
        background-color: #ffc107;
        color: white;
        border: none;
        border-radius: 4px;
        padding: 5px;
        font-size: 0.8em;
        cursor: pointer;
    }

    .btn-edit:hover {
        background-color: #e0a800;
    }

    .btn-delete {
        background-color: #dc3545;
        color: white;
        border: none;
        border-radius: 4px;
        padding: 5px;
        font-size: 0.8em;
        cursor: pointer;
    }

    .btn-delete:hover {
        background-color: #c82333;
    }
    </style>
    
</head>

<body>
    <div class="dashboard-content">
        <div class="container">
            <h2>Edit Jenis dan Tarif Layanan Laundry</h2>
            <form action="{{ route('manager.updatelayanan', $laundry->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Jenis Laundry:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="kiloan" name="jenis_laundry" value="kiloan" 
                            {{ $laundry->jenis_laundry == 'kiloan' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="kiloan">Kiloan</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="satuan" name="jenis_laundry" value="satuan" 
                            {{ $laundry->jenis_laundry == 'satuan' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="satuan">Satuan</label>
                    </div>
                </div>

                <label for="jenis_layanan">Jenis Layanan:</label>
                <input type="text" id="jenis_layanan" name="jenis_layanan" value="{{ $laundry->jenis_layanan }}" required>

                <div>
                    <label for="durasi_layanan">Durasi Layanan:</label>
                    <select id="durasi_layanan" name="durasi_layanan" required>
                        <option value="Express" {{ $laundry->durasi_layanan == 'Express' ? 'selected' : '' }}>Express</option>
                        <option value="Kilat" {{ $laundry->durasi_layanan == 'Kilat' ? 'selected' : '' }}>Kilat</option>
                        <option value="Reguler" {{ $laundry->durasi_layanan == 'Reguler' ? 'selected' : '' }}>Reguler</option>
                    </select>
                </div>

                <label for="tarif_layanan">Tarif Layanan:</label>
                <input type="number" id="tarif_layanan" name="tarif_layanan" value="{{ $laundry->tarif_layanan }}" required>

                <label for="keterangan">Keterangan:</label>
                <textarea id="keterangan" name="keterangan" rows="4">{{ $laundry->keterangan }}</textarea>

                <div class="form-group d-flex">
                    <button type="button" class="btn btn-batal" onclick="window.location.href='{{ route('manager.viewlayanan') }}'">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
