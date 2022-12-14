<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "db_dpoer";
   
$konek = mysqli_connect($host, $username, $password, $db);

if(mysqli_connect_errno()){
    echo "gagal";
}else{
    
}

?>