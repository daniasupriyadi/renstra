<?php
 // Koneksi db

 $dbHost = 'localhost';
 $dbName = 'renstra';
 $dbUsername = 'root';
 $dbPassword = '';

 $mysql = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

 if(!$mysql){
    die('Connection Error: '. mysqli_connect_error());
 } else {
    echo 'Konek berhasil';
 }
?>