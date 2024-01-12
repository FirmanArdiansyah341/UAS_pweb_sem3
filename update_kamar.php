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

<?php
include 'koneksi.php';

$nomor_faktur = $_POST['nomor_faktur'];
$nama_pemesan = $_POST['nama_pemesan'];
$jenis_kamar = $_POST['jenis_kamar'];
$nomor_kamar = $_POST['nomor_kamar'];
$tgl_pesan = $_POST['tgl_pesan'];
$tgl_habis = $_POST['tgl_habis'];
$harga = $_POST['harga'];

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

// Update data kamar di database
mysqli_query($koneksi, "UPDATE kamar SET 
                            nama_pemesan = '$nama_pemesan', 
                            jenis_kamar = '$jenis_kamar', 
                            nomor_kamar = '$nomor_kamar', 
                            tgl_pesan = '$tgl_pesan', 
                            tgl_habis = '$tgl_habis', 
                            lama = '$lama', 
                            harga = '$harga', 
                            diskon = '$diskon', 
                            total = '$total' 
                        WHERE nomor_faktur = '$nomor_faktur'");

// Redirect to view_kamar.php
header("location:view_kamar.php");
?>
