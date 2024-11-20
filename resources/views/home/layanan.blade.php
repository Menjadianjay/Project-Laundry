<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Laundry</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style_layanan.css">
</head>

<body>

    @include('template.navbar')
    
    <section class="image-header">
        <img src="img/layanan_header.png" alt="Podomoro Laundry" class="img-fluid w-100" />
        <div class="text">
            <p><b>Layanan Kami</b></p>
            <!-- <p><b>Harum, Rapi, Bersih</b></p> -->
        </div>
    </section>

    <!-- Layanan Kami Section -->
    <section class="container my-5">
        <h3 style="text-align: center;">Layanan Podomoro Laundry</h3>
        <br>
        <div class="row">
            <div class="col-md-4">
                <div class="carde">
                    <!-- <img src="4.png" class="card-img-top" alt="Layanan 1"> -->
                    <div class="card-body">
                        <h3 class="card-title"><b>Cuci Setrika</b></h3>
                        <p class="card-text">Dengan layanan cuci setrika, pakaian tidak hanya bersih tetapi juga
                            rapi dan siap digunakan.</p>
                        <p class="card-info"><b>Mulai dari Rp 5.000,-/kg</b></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="carde">
                    <!-- <img src="2.png" class="card-img-top" alt="Layanan 2"> -->
                    <div class="card-body">
                        <h3 class="card-title"><b>Cuci Lipat</b></h3>
                        <p class="card-text">Layanan cuci lipat memastikan pakaian Anda bersih dari noda dan dilipat
                            dengan rapi.</p>
                        <p class="card-info"><b>Mulai dari Rp 4.000,-/kg</b></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="carde">
                    <!-- <img src="3.png" class="card-img-top" alt="Layanan 3"> -->
                    <div class="card-body">
                        <h3 class="card-title"><b>Setrika</b></h3>
                        <p class="card-text">Layanan setrika kami memastikan tidak ada kerutan dan cocok
                            untuk pakaian berbahan khusus.</p>
                        <p class="card-info"><b>Mulai dari Rp 3.000,-/kg</b></p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Layanan Laundry Section -->
    <section class="container my-5">
        <h3 style="text-align: center;">Durasi Layanan</h3>
        <br>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <!-- <img src="4.png" class="card-img-top" alt="Layanan 1"> -->
                    <div class="card-body">
                        <h3 class="card-title"><b>Express</b></h3>
                        <p class="card-text">Proses selama 8 jam</p>
                        <p class="card-info">Rp 5.000,-/kg</p>
                        <a href="http://wa.me/628985552417" class="btn btn-primary">Pesan sekarang</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <!-- <img src="2.png" class="card-img-top" alt="Layanan 2"> -->
                    <div class="card-body">
                        <h3 class="card-title"><b>Kilat</b></h3>
                        <p class="card-text">Proses selama 2 hari</p>
                        <p class="card-info">Rp 4.000,-/kg</p>
                        <a href="http://wa.me/628985552417" class="btn btn-primary">Pesan sekarang</a>


                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <!-- <img src="3.png" class="card-img-top" alt="Layanan 3"> -->
                    <div class="card-body">
                        <h3 class="card-title"><b>Reguler</b></h3>
                        <p class="card-text">Proses selama 3 hari</p>
                        <p class="card-info">Rp 3.000,-/kg</p>
                        <a href="http://wa.me/628985552417" class="btn btn-primary">Pesan sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="text-center footer py-3">
        <p>&copy; 2024 Podomoro Laundry. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>