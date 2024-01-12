<?php
  include "koneksi.php";
  $sqlb = mysqli_query($con, "delete from transaksi where No_Faktur='$_GET[No_Faktur]'");
  
  if($sqlb){
  	echo "Data Berhasil Dihapus";
	window.location.href'index.php?module=tabeltransaksi';
  }else{
  	echo "Gagal Menghapus";
	window.location.href'index.php?module=tabeltransaksi';
  }
?>