<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hotel Transylvenia</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    .table thead th {
      background-color: black;
      color: white;
    }
    .tbody tr td {
      border: 1;
    }
  </style>
</head>

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
  <h2>Data Kamar</h2>
  <a href="tambah_kamar.php" class="btn btn-primary">Tambah Data</a>
  <p>Ini Daftar Booking Kamar Hotel Transylvania</p>
  <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>No. Faktur</th>
        <th>Nama</th>
        <th>Jenis Kamar</th>
        <th>No. Kamar</th>
        <th>Tgl. Pemesanan</th>
        <th>Tgl. Habis</th>
        <th>Lama (hari)</th>
        <th>Diskon</th>
        <th>Harga</th>
        <th>Total</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        include 'koneksi.php';
        $no=1;
        if (isset($_GET['nomor_faktur'])) {
          $search_query = $_GET['nomor_faktur'];
          $data = mysqli_query($koneksi, "SELECT * FROM kamar WHERE nomor_faktur LIKE '%$search_query%'");
        } else {
          $data = mysqli_query($koneksi,"SELECT * FROM kamar");
        }

        while($d = mysqli_fetch_array($data)){
      ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $d['nomor_faktur']; ?></td>
        <td><?php echo $d['nama_pemesan']; ?></td>
        <td><?php echo $d['jenis_kamar']; ?></td>
        <td><?php echo $d['nomor_kamar']; ?></td>
        <td><?php echo $d['tgl_pesan']; ?></td>
        <td><?php echo $d['tgl_habis']; ?></td>
        <td><?php echo $d['lama']; ?></td>
        <td><?php echo $d['diskon']; ?></td>
        <td><?php echo $d['harga']; ?></td>
        <td><?php echo $d['total']; ?></td>
        <td>
          <a class="btn btn-success" href="edit.php?id=<?php echo $d['nomor_faktur']; ?>">EDIT</a>
          <a class="btn btn-danger" href="hapus_kamar.php?id=<?php echo $d['nomor_faktur']; ?>">HAPUS</a>
        </td>
      </tr>
      <?php 
        }
      ?>      
    </tbody>
  </table>
</div>

</body>
</html>
