<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Buku Kas</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
        aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Kelola Transaksi
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <!-- <a class="dropdown-item" href="kas-masuk.php">Kas Masuk</a> -->
                    <!-- <a class="dropdown-item" href="kas-keluar.php">Kas Keluar</a> -->
                    <a class="dropdown-item" href="import_trx.php">Unggah Berkas Trx</a>
                    <a class="dropdown-item" href="import_data.php">Unggah Berkas Warga</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Pengaturan
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="warga.php">Kelola Data Warga</a>
                    <a class="dropdown-item" href="tipe-transaksi.php">Jenis Transaksi</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Laporan
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="transaksi.php">Catatan Transaksi</a>
                    <a class="dropdown-item" href="report-detail.php">Detail Transaksi</a>
                </div>
            </li>
        </ul>
    </div>
</nav>