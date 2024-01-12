<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit Kamar</title>
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
          <a class="nav-link" aria-current="page" href="../view_kamar.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="view_informasi.php">Informasi Kamar</a>
        </li>
      </ul>
      <form class="d-flex ms-2" method="GET" action="search_result.php">
        <input class="form-control me-2" type="search" placeholder="Nomor Kamar" aria-label="Search" name="nomor_faktur">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <a class="btn btn-outline-danger ms-auto" style="color: white; border-color: white;" href="../logout.php">Log Out</a>
    </div>
  </div>
</nav>

    <?php
    include 'koneksi.php';
    $nomor_kamar = $_GET['id'];
    $data = mysqli_query($koneksi, "SELECT * FROM informasi_kamar WHERE nomor_kamar = '$nomor_kamar'");
    while ($d = mysqli_fetch_array($data)) {
    ?>
        <div class="container mt-3">
            <h2>Form Edit Kamar</h2>
            <form action="update_informasi.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nomor_kamar">No. Kamar</label>
                    <input type="text" class="form-control" id="nomor_kamar" placeholder="No. Kamar" name="nomor_kamar" value="<?php echo $d['nomor_kamar']; ?> " readonly>
                </div>
                <div class="mb-3 mt-3">
                    <label for="jenis_kamar">Jenis Kamar</label>
                    <select class="form-control" id="jenis_kamar" name="jenis_kamar">
                        <option value="VIP" <?php echo ($d['jenis_kamar'] == 'VIP') ? 'selected' : ''; ?>>VIP</option>
                        <option value="Bisnis" <?php echo ($d['jenis_kamar'] == 'Bisnis') ? 'selected' : ''; ?>>Bisnis</option>
                        <option value="Economy" <?php echo ($d['jenis_kamar'] == 'Economy') ? 'selected' : ''; ?>>Economy</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="foto_kamar">Foto Kamar</label>
                    <input type="file" class="form-control" id="foto_kamar" name="foto_kamar">
                    <img src="../images/<?php echo $d['foto_kamar']; ?>" alt="Room Photo" class="mt-2" style="max-width: 200px; max-height: 200px;">
                </div>
                <div class="mb-3">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control" id="harga" placeholder="Harga Kamar" name="harga" value="<?php echo $d['harga']; ?>">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    <?php
    }
    ?>
</body>
</html>
