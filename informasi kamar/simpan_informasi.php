<?php
include "koneksi.php";
session_start();

if ($_SESSION['status'] !== "login") {
    header("location:index.php");
    exit();
}


$nomor_kamar = isset($_POST['nomor_kamar']) ? $_POST['nomor_kamar'] : '';
$jenis_kamar = isset($_POST['jenis_kamar']) ? $_POST['jenis_kamar'] : '';
$harga = isset($_POST['harga']) ? $_POST['harga'] : '';


if (isset($_FILES['foto_kamar'])) {
    $foto_kamar = $_FILES['foto_kamar']['name'];
    $tmp_file = $_FILES['foto_kamar']['tmp_name'];
    $upload_directory = '../images/';

    if (!empty($foto_kamar)) {
        $unique_filename = uniqid() . '_' . $foto_kamar;
        $check_query = "SELECT * FROM informasi_kamar WHERE nomor_kamar = '$nomor_kamar' AND jenis_kamar = '$jenis_kamar'";
        $check_result = mysqli_query($koneksi, $check_query);

        if (mysqli_num_rows($check_result) > 0) {
            echo "<script>alert('Kamar dengan nomor dan jenis tersebut sudah ada di data.'); window.location.href = 'view_informasi.php';</script>";
        } else {
            if (move_uploaded_file($tmp_file, $upload_directory . $unique_filename)) {
                $insert_query = "INSERT INTO informasi_kamar (nomor_kamar, jenis_kamar, foto_kamar, harga) VALUES ('$nomor_kamar','$jenis_kamar','$unique_filename','$harga')";

                if (mysqli_query($koneksi, $insert_query)) {
                    header("location:view_informasi.php?pesan=tambah");
                    exit();
                } else {
                    echo "Error: " . $insert_query . "<br>" . mysqli_error($koneksi);
                }
            } else {
                echo "File upload failed. Check the upload directory permissions.";
            }
        }
    } else {
        echo "Error: No file selected. Please choose a file.";
    }
} else {
    echo "Error: File input field not found.";
}
?>
