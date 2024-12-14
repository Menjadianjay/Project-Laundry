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

</head>
<style>
    html, body {
        margin: 0;
        padding: 0;
        overflow: hidden;
        width: 100%;
        height: 100%;
    }

    body {
        background-image: url("{{ asset('img/dash.png') }}");
        background-size: cover;
        background-position: center;
    }

    .container {
        background-color: #fff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 75%;
        height: 75vh;
        margin: 5% 15%;
        overflow-y: auto;
        overflow-x: auto;
    }
    .dashboard-content {
    margin-left: 250px;
    min-height: 100vh;
    background-image: url("../img/dash.png");
    background-position: flex;
    background-size: 100% 100%;
    background-repeat: no-repeat;
    }

    /* Scrollbar styling */
    .container::-webkit-scrollbar {
        width: 8px;
        height: 8px;  /* Added for horizontal scrollbar */
    }

    .container::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 4px;
    }

    .container::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 4px;
    }

    .container::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    /* Table styling */
    h2 {
        color: black;
        margin-bottom: 20px;
        position: sticky;
        top: 0;
        background-color: #fff;
        padding: 10px 0;
        z-index: 2;
    }

    .table-container {
        margin-top: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        min-width: 900px; /* Minimum width for the table */
    }

    thead {
        position: sticky;
        top: 50px;
        z-index: 1;
        background-color: #5eb1e6;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 12px 15px;
        text-align: left;
    }

    th {
        color: white;
        font-weight: 500;
    }

    /* Button styling */
    button,
    .btn-edit,
    .btn-hapus {
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        margin: 0 4px;
        transition: background-color 0.2s;
    }

    .btn-edit {
        background-color: #5eb1e6;
        color: white;
    }

    .btn-edit:hover {
        background-color: #4a9ed0;
    }

    .btn-hapus {
        background-color: #f44336;
        color: white;
    }

    .btn-hapus:hover {
        background-color: #e53935;
    }

    .btn-secondary {
        background-color: #f44336;
        padding: 10px 20px;
        width: auto;
        min-width: 120px;
    }

    .btn-secondary:hover {
        background-color: #e53935;
    }
</style>
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

