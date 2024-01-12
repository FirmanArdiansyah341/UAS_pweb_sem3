<?php
$nomor_faktur = $_POST['nomor_faktur'] ?? '';
$nama_pemesan = $_POST['nama_pemesan'] ?? '';
$jenis_kamar = $_POST['jenis_kamar'] ?? '';
$nomor_kamar = $_POST['nomor_kamar'] ?? '';
$tgl_pesan = $_POST['tgl_pesan'] ?? '';
$tgl_habis = $_POST['tgl_habis'] ?? '';
$harga = $_POST['harga'] ?? '';

// Calculate duration in nights
$tgl_pesan_obj = new DateTime($tgl_pesan);
$tgl_habis_obj = new DateTime($tgl_habis);
$lama = $tgl_habis_obj->diff($tgl_pesan_obj)->format('%a');

// Apply diskons based on jenis_kamar
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kamar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
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
      <form class="d-flex ms-2" method="GET" action="search_result.php">
        <input class="form-control me-2" type="search" placeholder="Nomor Faktur" aria-label="Search" name="nomor_faktur">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <a class="btn btn-outline-danger ms-auto" style="color: white; border-color: white;" href="logout.php">Log Out</a>
    </div>
  </div>
</nav>

    <div class="container mt-3">
        <h2>Edit Kamar</h2>
        <form action="update_kamar.php" method="post">
            <input type="hidden" name="nomor_faktur" value="<?= $nomor_faktur ?>">
            <input type="hidden" name="diskon" value="<?= $diskon ?>">
            <input type="hidden" name="total" value="<?= $total ?>">
            
            <div class="mb-3">
                <label for="nama_pemesan">Nama Pemesan</label>
                <input type="text" class="form-control" id="nama_pemesan" placeholder="Nama Pemesan" name="nama_pemesan" value="<?= $nama_pemesan ?>">
            </div>
            <div class="mb-3 mt-3">
                <label for="jenis_kamar">Jenis Kamar</label>
                <select class="form-control" id="jenis_kamar" name="jenis_kamar">
                    <option value="VIP" <?= ($jenis_kamar == 'VIP') ? 'selected' : '' ?>>VIP</option>
                    <option value="Bisnis" <?= ($jenis_kamar == 'Bisnis') ? 'selected' : '' ?>>Bisnis</option>
                    <option value="Economy" <?= ($jenis_kamar == 'Economy') ? 'selected' : '' ?>>Economy</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="nomor_kamar">No. Kamar</label>
                <input type="text" class="form-control" id="nomor_kamar" placeholder="No. Kamar" name="nomor_kamar" value="<?= $nomor_kamar ?>">
            </div>
            <div class="mb-3">
                <label for="tgl_pesan">Tgl. Pesan</label>
                <input type="date" class="form-control" id="tgl_pesan" placeholder="Tgl. Pesan" name="tgl_pesan" value="<?= $tgl_pesan ?>">
            </div>
            <div class="mb-3">
                <label for="tgl_habis">Tgl. Habis</label>
                <input type="date" class="form-control" id="tgl_habis" placeholder="Tgl. Habis" name="tgl_habis" value="<?= $tgl_habis ?>">
            </div>
            <div class="mb-3">
                <label for="harga">Harga</label>
                <input type="text" class="form-control" id="harga" placeholder="Harga Kamar" name="harga" value="<?= $harga ?>">
            </div>
            <div class="mb-3">
                <label for="diskon">Diskon</label>
                <input type="text" class="form-control" id="diskon" placeholder="Diskon" name="diskon" value="<?= $diskon ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="total">Total Harga</label>
                <input type="text" class="form-control" id="total" placeholder="Total Harga" name="total" value="<?= $total ?>" readonly>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>
