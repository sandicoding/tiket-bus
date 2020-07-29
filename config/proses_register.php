<?php 
include "koneksi.php";

$username = trim(mysqli_real_escape_string($conn,$_POST["username"]));
$email = $_POST["email"];
$telepon = $_POST["telepon"];
$password = md5(trim(mysqli_real_escape_string($conn,$_POST["password"])));


$query = "INSERT INTO user VALUES(null,'$username','$email','$password','$telepon','user')";

mysqli_query($conn,$query)or die(mysqli_error($conn));

header("location: ../login.php");










 ?>