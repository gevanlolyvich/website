<?php
include ("koneksi.php");
$page=$_GET['page'];
$proses=$_GET['proses'];

if ($page=='users' AND $proses=='hapus'){
  mysqli_query($koneksi,"DELETE FROM ".$page." WHERE id='$_GET[id]'");
  header('location:index.php?p='.$page);
}


elseif ($page=='users' AND $proses=='input'){
  mysqli_query($koneksi,"INSERT INTO users (id_user,nama,gender,jabatan) 
	                       VALUES(
                                '$_POST[id_user]','$_POST[nama]','$_POST[gender]','$_POST[jabatan]')");
  header('location:index.php?p='.$page);
  }
  
elseif ($page=='users' AND $proses=='update'){
    mysqli_query($koneksi,"UPDATE users SET 
                            id_user     = '$_POST[id_user]',
                            nama        = '$_POST[nama]',
                            gender  = '$_POST[gender]',
                            jabatan    = '$_POST[jabatan]' WHERE id = '$_POST[id]'");
  header('location:index.php?p='.$page);
  }

?>