<?php
 
    //Variabel database
    $servername = "gevan.czd30rxjacjs.us-east-1.rds.amazonaws.com";
    $username = "admin";
    $password = "rezagevan";
    $dbname = "manajemen";
 
    $conn = mysqli_connect("$servername", "$username", "$password","$dbname");
 
    $var1 = $_GET['iduser'];
    $var2 = $_GET['nama'];
    $var3 = $_GET['suhu'];
    $var4 = $_GET['access'];
	$result = mysqli_query($conn, "INSERT INTO akses(id_user,nama,suhu,access) VALUES('$var1','$var2','$var3','$var4')");

    if ($result) 
        {
           echo"done";
        }
