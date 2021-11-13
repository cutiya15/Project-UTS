<?php 
$conn = mysqli_connect("localhost", "root", "", "tugasphp");
$result = mysqli_query($conn, "SELECT *FROM mhs");
if(isset($_POST['bsimpan']))
{
   if($_GET['hal'] == "edit")
   {
   	$edit = mysqli_query ($conn, "UPDATE mhs set 
   		nim = '$_POST[tnim]',
   		nim = '$_POST[tnama]',
   		nim = '$_POST[tprodi]',
   		WHERE no = '$_GET[id]'
   		");
   	if($edit)
   	{
   		echo "<script>
   		alert('Edit data suksess!');
   		document.location='dashboard.php';
   		</script>";
   	}
   	else
   	{
   		echo "<script>
   		alert('Edit GAGAL!!');
   		document.location='dashboard.php';
   		</script>";

   	}
   }
   else
   {
   	$simpan = mysqli_query($conn, "INSERT INTO mhs (nim, nama, prodi)
   		VALUES ('$_POST[tnim]',
   		'$_POST[tnama]',
   		'$_POST[tprodi]')
   		");
   	if($simpan)
   	{
   		echo "<script>
   		alert('Simpan data suksess!');
   		document.location='dashboard.php';
   		</script>";
   	}
   	else
   	{
   		echo "<script>
   		alert('Simpan data GAGAL!!');
   		document.location='dashboard.php';
   		</script>";
   	}


   }
}
if(isset($_GET['hal']))
{
	if($_GET['hal'] == "edit")
	{
		$tampil= mysqli_query($conn, "SELECT * FROM mhs WHERE no = '$_GET[id]'");
		$data = mysqli_fetch_array($tampil);
		if($data)
		{
			$nim = $data['nim'];
			$nama = $data['nama'];
			$prodi = $data['prodi'];
		}
	}
	else if ($_GET['hal'] == "hapus")
	{
		$hapus = mysqli_query ($conn, "DELETE FROM mhs WHERE no = '$_GET[id]'");
		if($hapus){
		echo "<script>
   		alert('Hapus Data Suksess!!');
   		document.location='dashboard.php';
   		</script>";
		}
	}
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CRUD</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-warning fixed-top">
		<div class="container-fluid">
			<a class="navbar-brand" href="#"><b>WEB KAMPUS UNIVERSITAS GAJAYANA MALANG</b></a>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="logout.php" onclick="return confirm('yakin ingin keluar')">Logout</a>
					</li>
				</ul>
				<form class="d-flex">
					<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success" type="submit">Search</button>
				</form>
			</div>
			
		</div>
		
	</nav>
	<hr>
	<div class="container">
		<br/>
		<br/>
		<h2 class="text-center">FORM DATA MAHASISWA</h2>
		<div class="class mt-3">
			<div class="card-header bg-primary text-white">
				MASUKAN DATA MAHASISWA DIBAWAH
				
			</div>
			<div class="card-body">
				<form method="post" action="">
					<div class="from-group">
						<label>Nim</label>
						<input type="text" name="tnim" value="<?=@$nim?>" class="form-control" placeholder="Input Nim anda disini!" required>
						
					</div>
					<div class="from-group">
						<label>Nama</label>
						<input type="text" name="tnama" value="<?=@$nama?>" class="form-control" placeholder="Input Nama anda disini!" required> 
						
					</div>
					<div class="from-group">
						<label>Program Studi</label>
						<input type="text" name="tprodi" value="<?=@$prodi?>" class="form-control" placeholder="Input Prodi anda disini!" required>
						
					</div>
					<button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
					<button type="reset" class="btn btn-danger" name="breset">Kosongkan</button>

				</form>
				
			</div>
			
		</div>
		<br/>
		<div class="card mt-3">
			<div class="card-header bg-success text-white">
				Daftar Mahasiswa
			</div>
			<div class="card-body">
				<table class="table table-bordered table-striped">
					<tr>
						<th>No.</th>
						<th>Nim</th>
						<th>Nama</th>
						<th>Program Studi</th>
						<th>Aksi</th>
					</tr>
					<?php 
					
					$no= 1;
					$tampil = mysqli_query($conn, "SELECT * from mhs order by no desc");
					while ($data = mysqli_fetch_array($tampil)) : 
					 ?>

					 <tr>
					 	<td><?=$no++;?></td>
					 	<td><?=$data['nim']?></td>
					 	<td><?=$data['nama']?></td>
					 	<td><?=$data['prodi']?></td>
					 	<td>
					 		<a href="dashboard.php?hal=edit&id=<?=$data['no']?>" class="btn btn-warning">Edit</a>
					 		<a href="dashboard.php?hal=hapus&id=<?=$data['no']?>" class="btn btn-danger">Hapus</a>
					 	</td>
					 </tr>
					<?php endwhile;
					 ?>
				</table>
				
			</div>
			
		</div>
		
	</div>

</body>
</html>