<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Layanan Laundry</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/da.css') }}">
</head>
<style>
    .container {
        background-color: #ffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 0px rgba(0, 0, 0, 0);
        width: 500px;
        text-align: center;
        position: relative;
        z-index: 1;
        margin-left: 250px;
    }

    h2 {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        text-align: left;
    }

    input[type="text"],
    input[type="number"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

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
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            width: 15%;
            
    }

    .btn-secondary:hover {
        background-color: #e53935;
    }
</style>

<body>
    @include('template.sidebarmanager')
    <div class="dashboard-content">
        <div class="container">
            <h2>Update Jenis dan Tarif Layanan Laundry</h2>
    
            <!-- Form untuk memilih layanan yang akan di-update atau dihapus -->
            <form action="prc_update.php" method="POST">
                <label for="pilih_layanan">Pilih Layanan:</label>
                <select id="pilih_layanan" name="pilih_layanan" required>
                    <option value="" di sabled selected>Pilih layanan untuk di-update</option>
                    <option value="1">Cuci Kering - Express</option>
                    <!-- Contoh pilihan, ganti sesuai dengan data dari DB -->
                    <option value="2">Cuci Setrika - Reguler</option>
                </select>
    
                <label for="jenis_layanan">Jenis Layanan:</label>
                <input type="text" id="jenis_layanan" name="jenis_layanan"
                    placeholder="Masukkan jenis layanan baru (contoh: Cuci Kering)" required>
    
                <label for="nama_layanan">Nama Layanan:</label>
                <input type="text" id="nama_layanan" name="nama_layanan"
                    placeholder="Masukkan nama layanan baru (contoh: Express)" required>
    
                <label for="durasi_layanan">Durasi Layanan:</label>
                <input type="text" id="durasi_layanan" name="durasi_layanan"
                    placeholder="Masukkan durasi layanan (contoh: 8 jam)" required>
    
                <label for="tarif_layanan">Tarif Layanan (Rp/kg):</label>
                <input type="number" id="tarif_layanan" name="tarif_layanan" placeholder="Masukkan tarif (contoh: 5000)"
                    step="1000" min="0" required>
    
                <div class="button-group">
                    <a href="{{ route('manager.viewlayanan') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" name="action" value="update">Simpan</button>
                </div>
            </form>
        </div>      
    </div>
    
</body>

</html>