<?php
include ("koneksi.php");
$page=$_GET['page'];
$proses=$_GET['proses'];

if ($page=='akses' AND $proses=='hapus'){
  mysqli_query($koneksi, "DELETE FROM ".$page." WHERE id='$_GET[id]'");
  header('location:index.php?p='.$page);
}