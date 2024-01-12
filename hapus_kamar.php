<?php 
include 'koneksi.php';

$nomor_faktur = $_GET['id'];

//meghapus data
$query = "DELETE FROM kamar WHERE nomor_faktur ='$nomor_faktur'";

if(mysqli_query($koneksi, $query)) {
    echo "Record deleted successfully";
    header("location:view_kamar.php");
} else {
    echo "Error deleting record: " . mysqli_error($koneksi);
}
?>
