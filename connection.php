<?php 

$conn = mysqli_connect("localhost", "root", "", "db_clinic");

if(mysqli_connect_error()){
    echo "failed to connect : " . mysqli_connect_error();
    die();
}
?>