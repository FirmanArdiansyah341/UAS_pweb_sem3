<?php 
include 'koneksi.php';

$nomor_kamar = $_GET['id'];

//meghapus data
$query = "DELETE FROM informasi_kamar WHERE nomor_kamar ='$nomor_kamar'";

if(mysqli_query($koneksi, $query)) {
    echo "Record deleted successfully";
    header("location:view_informasi.php");
} else {
    echo "Error deleting record: " . mysqli_error($koneksi);
}
?>
