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
            width: 100%;
            height: 100%;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-image: url("{{ asset('img/dash.png') }}");
            background-size: cover;
            background-position: center;
        }

        .navbar {
        text-align: center;
        background: rgba(255, 255, 255, 0.8);
        padding: 10px 0;
        width: 100%;
        position: fixed;
        top: 0;
        z-index: 1000;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        display: grid; /* Add this line */
        place-items: center; /* Add this line */
        }

        .navbar h1 {
            margin: 0;
            color: #333;
            font-size: 1.5rem;
        }

        .dashboard-content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100%;
            text-align: center;

        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 500px;
            text-align: center;
            overflow-y: auto;

        }

        h1 {
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
