<?php
require_once ('koneksi.php');
require_once ('sql.php');

$obj = new crud;
if(!$obj->detailData($_GET['id_mahasiswa'])) die("Error : id mahasiswa tidak ada");
if($_SERVER['REQUEST_METHOD']=='POST'):

	if($obj->deleteData($obj->id_mahasiswa)):
		echo '<div class="alert alert-success">Data berhasil dihapus</div>';
	else:

		echo '<div class="alert alert-danger">Data tidak berhasil disimpan</div>';
	endif;
endif;
?>
<!DOCTYPE html>
<html>
<head>
	<title> CRUD OOP PHP</title>

	<link href="fontawesome-free-6.4.2-web/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">

</head>
<body>
	<div class="container">
		<div class="card shadow mb-4 mt-4">
	            <div class="card-header py-3">
	                <h6 class="m-0 font-weight-bold text-danger"> CRUD OOP PHP </h6>
	            </div>
	        <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
		        <div class="card-body">
					<button type="submit" class="mt-4 btn btn-md btn-danger">Delete</button>
					 <!-- Tambahkan tombol kembali ke halaman utama -->
					 <a href="index.php" class="mt-4 btn btn-md btn-secondary">Kembali</a>

				</div>
			</form>
	
		</div>
	</div>

<script src="bootstrap-5.3.2-dist/js/bootstrap.min.js"></script>
</body>
</html>