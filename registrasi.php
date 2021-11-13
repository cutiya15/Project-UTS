<?php 
require 'koneksi.php';

if (isset($_POST["register"])){
	if (registrasi($_POST)>0) {
		echo "<script> alert('user baru berhasil ditambahkan!');
		</script>
		";
	}else {
		echo mysqli_error($conn);

	}
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Registrasi</title>
	<style type="text/css">
		label{
			display: block;
		}
		table{
			border: 0;
		}
	</style>
</head>
<body>
	<h1>HALAMAN REGISTRASI</h1>
	<form action="" method="post">
		<table>
		<tr>
			<td><label for="username">Username</label></td>
			<td>:</td>
			<td><input type="username" name="username" id="username"></td>
		</tr>
		<tr>
			<td><label for="password">Password</label></td>
			<td>:</td>
			<td><input type="password" name="password" id="password"></td>
		</tr>
		<tr>
			<td><label for="password2">Konfirmasi Password</label></td>
			<td>:</td>
			<td><input type="password" name="password2" id="password2"></td>
		</tr>
		<tr>
			<td colspan="2">
				<button type="submit" name="register">Register</button>
			</td>
			<td>
				<button><a href="login.php">Masuk</a></button>
			</td>
		</tr>
		</table>
	</form>

</body>
</html>