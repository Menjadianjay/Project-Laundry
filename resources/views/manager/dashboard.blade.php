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
        position: fixed;
        width: 100%;
        height: 100%;
        }

        body {
            background-image: url("{{ asset('img/dash.png') }}");
            height: 100vh;
            background-size: cover;
            background-position: center;
        }

        .container {
            background-color: #ffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 5 0 10px rgba(0, 0, 0, 0.1);
            width: 500px;
            text-align: center;
            position: absolute;
            top: 50%;
            left: 60%;
            transform: translate(-50%, -50%);
            max-height: 90vh;
            overflow-y: auto;
        }
        h1{
            background-color: white;
            color: black;
        }
</style>

<body>
    <div class="navbar">
        <h1>Selamat Datang Manager</h1>
    </div>
    @include('template.sidebarmanager')
    <div class="dashboard-content">
        <div class="container">
            @foreach ($transaksis as $transaksi)
            <div class="col-md-4">
                <div class="carde">
                    <h3 class="card-title"></h3>
                    <p class="card-text">{{$transaksi->tanggal_masuk }}</p>
                    <p class="card-info"><b>Rp. {{ number_format($transaksi->total_harga, 0, ',', '.') }}</b></p>

                </div>
            </div>
            <br>
            <div class="col-md-4">
                <div class="carde">
                    <h3>need some break</h3>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>

</html>
