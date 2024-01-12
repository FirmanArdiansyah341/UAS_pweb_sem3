<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Kamar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php 
    $nama_pemesan = $_POST['nama_pemesan'] ?? '';
    $jenis_kamar = $_POST['jenis_kamar'] ?? '';
    $nomor_kamar = $_POST['nomor_kamar'] ?? '';
    $tgl_pesan = $_POST['tgl_pesan'] ?? '';
    $tgl_habis = $_POST['tgl_habis'] ?? '';
    $harga = $_POST['harga'] ?? '';

    $tgl_pesan_obj = new DateTime($tgl_pesan);
    $tgl_habis_obj = new DateTime($tgl_habis);
    $lama = $tgl_habis_obj->diff($tgl_pesan_obj)->format('%a');


    $diskon = 0;
    if ($jenis_kamar == 'VIP' && $lama >= 7) {
        $diskon = 300000;
    } elseif ($jenis_kamar == 'Bisnis' && $lama >= 3) {
        $diskon = 200000;
    } elseif ($jenis_kamar == 'Economy' && $lama >= 5) {
        $diskon = 100000;
    }

    $total = ($harga * $lama) - $diskon;
    ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="view_kamar.php">
            <img src="https://i.pinimg.com/originals/05/de/86/05de863dff170600b90502b1a12e57f0.jpg" alt="" width="30" height="24" class="d-inline-block align-text-top">
            Hotel Transylvania
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="view_kamar.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../UAS/informasi kamar/view_informasi.php">Informasi Kamar</a>
                </li>
            </ul>
            <form class="d-flex ml-auto" method="GET" action="search_result.php">
                <input class="form-control me-2" type="search" placeholder="Search by Nomor Faktur" aria-label="Search" name="nomor_faktur">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>

    <div class="container mt-3">
        <h2>Form Kamar</h2>
        <form action="simpan_data.php" method="post">
        <div class="mb-3">
                <label for="nama_pemesan">Nama</label>
                <input type="text" class="form-control" id="nama_pemesan" placeholder="Nama" name="nama_pemesan" value="<?php echo $nama_pemesan; ?>">
            </div>
            <div class="mb-3 mt-3">
                <label for="jenis_kamar">Jenis Kamar</label>
                <select class="form-control" id="jenis_kamar" name="jenis_kamar">
                    <option value="" disabled selected hidden>Pilih Jenis Kamar</option>
                    <option value="VIP" style="color: black;" <?php echo ($jenis_kamar == 'VIP') ? 'selected' : ''; ?>>VIP</option>
                    <option value="Bisnis" style="color: black;" <?php echo ($jenis_kamar == 'Bisnis') ? 'selected' : ''; ?>>Bisnis</option>
                    <option value="Economy" style="color: black;" <?php echo ($jenis_kamar == 'Economy') ? 'selected' : ''; ?>>Economy</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="nomor_kamar">No. Kamar</label>
                <input type="text" class="form-control" id="nomor_kamar" placeholder="No. Kamar" name="nomor_kamar" value="<?php echo $nomor_kamar; ?>">
            </div>
            <div class="mb-3">
                <label for="tgl_pesan">Tgl. Pesan</label>
                <input type="date" class="form-control" id="tgl_pesan" placeholder="Tgl. Pesan" name="tgl_pesan" value="<?php echo $tgl_pesan; ?>">
            </div>
            <div class="mb-3">
                <label for="tgl_habis">Tgl. Habis</label>
                <input type="date" class="form-control" id="tgl_habis" placeholder="Tgl. Habis" name="tgl_habis" value="<?php echo $tgl_habis; ?>">
            </div>
            <div class="mb-3">
                <label for="harga">Harga</label>
                <input type="text" class="form-control" id="harga" placeholder="Harga Kamar" name="harga" value="<?php echo $harga; ?>">
            </div>
            <div class="mb-3">
                <label for="lama">Lama</label>
                <input type="text" class="form-control" id="lama" placeholder="lama" name="lama" value="<?php echo $lama; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="diskon">Diskon</label>
                <input type="text" class="form-control" id="diskon" placeholder="Diskon" name="diskon" value="<?php echo $diskon; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="total">Total Harga</label>
                <input type="text" class="form-control" id="total" placeholder="Total Harga" name="total" value="<?php echo $total; ?>" readonly>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>
