
<div class="sidebar">
    <a class="navbar-brand" href="dashboard">
        <img src="{{ asset('img/logo.png') }}" style="width: 200px; height: auto; display: block;">
    </a>
    
    <br><br>
    <a href="dashboard"><i></i>Dashboard</a>
    <a href="inputdata"><i class="fas fa-plus"></i> Input transaksi</a>
    <a href="viewdata"><i class="fas fa-file-alt"></i> Lihat Data Transaksi</a>
    <a href="presensi"><i class="fas fa-edit"></i>Presensi Pegawai</a>
    <a href="viewpresensi"><i class="fas fa-calendar-alt"></i> Lihat Data Presensi</a>
    {{-- <a href=""><i class="fas fa-plus"></i> Tambah Layanan</a>
    <a href=""><i class="fas fa-eye"></i> Lihat Tarif Layanan</a> --}}
    <form method="POST" action="{{ route('logout') }}" id="logout-form">
        @csrf
        <a href="#" onclick="document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </form>
    
</div>
