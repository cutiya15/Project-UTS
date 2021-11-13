<?php 

$conn = mysqli_connect("localhost", "root", "","tugasphp");
function query($query){
	global $conn;
	$result = mysql_query($conn, $query);
	$rows = [];
	while ($row =mysqli_fetch_assoc($result)){
		$rows[] = $row;

	}
	return $rows;
}

function registrasi($data){
	global $conn;

	$username = strtolower(stripcslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password"]);
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username ='$username'");
    if (mysqli_fetch_assoc($result)) {
    	echo "<script> alert('username sudah ada');
		</script> ";
		return false;
    }
	if ($password !== $password2) {
		echo "<script> alert('konfirmasi password tidak sesuai');
		</script> ";
		return false;
	}

$password = password_hash($password, PASSWORD_DEFAULT);
mysqli_query($conn, "INSERT INTO user VALUES('','$username','password')");

return mysqli_affected_rows($conn);
}
?>