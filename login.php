<?php 
include 'koneksi.php';
if (isset($_POST["login"])) {
	$username = $_POST["username"];
	$password =$_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");

	if (mysqli_num_rows($result)=== 1) {
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password"])) {
			header("Location: dashboard.php");
			exit;
		}
	}
	$error = true;
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
		p {
			color:red;
			font-style:italic;
		}
		}
	</style>
</head>
<body>
	<h1>HALAMAN LOGIN</h1>
	<?php 
	if (isset($error)) : ?>
		<p>Username/password anda salah</p>
	<?php endif; ?>
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
			<td colspan="2">
				<button type="submit" name="login">LOGIN</button>
			</td>
			<td >
				<button><a href="registrasi.php">Register</a></button>
			</td>
		</tr>
		</table>
	</form>

</body>
</html>