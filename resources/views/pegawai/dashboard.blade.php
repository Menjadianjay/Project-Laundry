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
            margin-left:10%;
        }
        h1{
            background-color: white;
            color: black;
        }

        @media screen and (max-width: 768px) {
            .navbar h1 {
                font-size: 1.2rem;
            }

            .container {
                width: 95%;
            }
        }

        @media screen and (max-width: 480px) {
            .navbar h1 {
                font-size: 1rem;
            }

            .container {
                padding: 15px;
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>
    <div class="navbar">
        <h1>Selamat Datang {{ Auth::user()->name }}</h1>
    </div>
    @include('template.sidebarpegawai')
    <div class="dashboard-content">
        <div class="container">
            <h2>On Going</h2>
        </div>
    </div>
</body>

</html>
