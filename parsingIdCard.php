<?php
require 'koneksi.php';
?>*<?php
$ambilnama= mysqli_query($conn,"select * from users");
while($data=mysqli_fetch_array($ambilnama)){$nama = $data['id_user'];?><?=$nama;?>,<?php
};
?>#
