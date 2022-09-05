<?php
require 'function.php';
?>*<?php
$ambilnama= mysqli_query($conn,"select * from users");
while($data=mysqli_fetch_array($ambilnama)){$nama = $data['nama'];?><?=$nama;?>,<?php
};
?>#
