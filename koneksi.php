<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "warungdpoer";
   
$konek = mysqli_connect($host, $username, $password, $db);

if(mysqli_connect_errno()){
    echo "gagal";
}else{
    
}

?>