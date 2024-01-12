<?php
include 'koneksi.php';

$nama_pemesan = $_POST['nama_pemesan'];
$jenis_kamar = $_POST['jenis_kamar'];
$nomor_kamar = $_POST['nomor_kamar'];
$tgl_pesan = $_POST['tgl_pesan'];
$tgl_habis = $_POST['tgl_habis'];
$durasi = $_POST['lama'];
$harga_obj = $_POST['harga'];
$diskon_obj = $_POST['diskon'];
$total_harga = $_POST['total'];

$result = mysqli_query($koneksi, "SELECT * FROM kamar WHERE 
                                        (jenis_kamar = '$jenis_kamar' AND nomor_kamar = '$nomor_kamar') 
                                        AND 
                                        (
                                            (tgl_pesan <= '$tgl_pesan' AND tgl_habis >= '$tgl_pesan') 
                                            OR 
                                            (tgl_pesan <= '$tgl_habis' AND tgl_habis >= '$tgl_habis')
                                            OR 
                                            ('$tgl_pesan' >= tgl_pesan AND '$tgl_habis' <= tgl_habis)
                                        )");

if (mysqli_num_rows($result) > 0) {
    echo "<script>alert('Kamar sudah dipesan dalam rentang waktu yang sama dengan jenis kamar dan nomor kamar yang sama.');</script>";
    echo "<script>window.location.href = 'view_kamar.php';</script>";
} else {
    $query = "INSERT INTO kamar (nama_pemesan, jenis_kamar, nomor_kamar, tgl_pesan, tgl_habis, lama, harga, diskon, total)
                            VALUES ('$nama_pemesan', '$jenis_kamar', '$nomor_kamar', '$tgl_pesan', '$tgl_habis', '$durasi', '$harga_obj', '$diskon_obj', '$total_harga')";
    
    if (mysqli_query($koneksi, $query)) {
        header("location:view_kamar.php");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}
?>
