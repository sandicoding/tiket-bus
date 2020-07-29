<?php

	include "koneksi.php";

	$username = trim(mysqli_real_escape_string($conn,$_POST["username"]));
	$email = trim(mysqli_real_escape_string($conn,$_POST["email"]));
    $password = md5(trim(mysqli_real_escape_string($conn,$_POST["password"])));

	$query     ="SELECT * FROM user WHERE username='$username' AND password='$password'";

	$login     = mysqli_query($conn,$query)or die(mysqli_error($conn));
	$jlhrecord = mysqli_num_rows($login);

	$data      = mysqli_fetch_array($login,MYSQLI_BOTH);

	$username  = $data['username'];
	$level     = $data['level'];
	

	if ($jlhrecord > 0){

		// jika Username dan password ada didalam database daftarkan session
		session_start();
		$_SESSION['username']  = $username;
		$_SESSION['level']     = $level;
		$_SESSION['id']        = session_id();
		
		header('location: ../admin/admin2.php'); 

	}else{
		$query_user     ="SELECT * FROM user WHERE email='$email' AND password='$password' AND level='user'";

		$login_user     = mysqli_query($conn,$query_user)or die(mysqli_error($conn));
		$true_register = mysqli_num_rows($login_user);

		$data      = mysqli_fetch_array($login_user,MYSQLI_BOTH);

		$username  = $data['username'];
		$email	   = $data["email"];
		$level	   = $data['level'];
		$id_user   = $data['id_user'];
		if ($true_register > 0) {
			
		session_start();
		$_SESSION['username']  = $username;
		$_SESSION['email']	   = $email;
		$_SESSION['level']	   = $level;
		$_SESSION['id_user']   = $id_user;
		$_SESSION['id']        = session_id();
		
		header('location: ../index.php');

		}

	}
		// echo $data;
		//header("location:index.php");
		print"
			<script>
				alert(\"Username atau Password Anda Salah!\");
				history.back(-1);
			</script>";
	
?>