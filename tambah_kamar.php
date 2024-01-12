<!DOCTYPE html>
<html lang="en">
<head>
  <title>Form Masukkan Data</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>
        
  </style>
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
  <h2>Form Tambah Kamar</h2>
  <form action="proses_kamar.php" method="post">
  <div class="mb-3">
      <label for="nama_pemesana">Nama</label>
      <input type="text" class="form-control" id="nama_pemesan" placeholder="Nama Pemesan" name="nama_pemesan">
    </div>
    <div class="mb-3 mt-3">
        <label for="jenis_kamar">Jenis Kamar</label>
        <select class="form-control" id="jenis_kamar" name="jenis_kamar">
            <option value="" style="color: gray;" disabled selected hidden>Pilih Jenis Kamar</option>
            <option value="VIP" style="color: black;">VIP</option>
            <option value="Bisnis" style="color: black;">Bisnis</option>
            <option value="Economy" style="color: black;">Economy</option>
        </select>
    </div>
    <div class="mb-3">
      <label for="nomor_kamar">No.kamar</label>
      <input type="text" class="form-control" id="nomor_kamar" placeholder="No. Kamar" name="nomor_kamar">
    </div>
    <div class="mb-3">
      <label for="tgl_pesan">Tgl.Pesan</label>
      <input type="date" class="form-control" id="tgl_pesan" placeholder="Tgl.Pesan" name="tgl_pesan">
    </div>
    <div class="mb-3">
      <label for="tgl_habis">Tgl.habis</label>
      <input type="date" class="form-control" id="tgl_habis" placeholder="Tgl.habis" name="tgl_habis">
    </div>
    <div class="mb-3">
      <label for="harga">Harga Kamar</label>
      <input type="text" class="form-control" id="harga" placeholder="Harga Kamar" name="harga">
    </div>
    <button type="submit" class="btn btn-primary">Proses</button>
  </form>
</div>
</body>
</html>