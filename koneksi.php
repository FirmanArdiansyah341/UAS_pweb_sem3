<?php 
 $koneksi = mysqli_connect("localhost","root","","uas_sem3");
 if(mysqli_connect_errno()){
    echo "koneksi database gagal : ".mysqli_connect_errno();
 }
?>