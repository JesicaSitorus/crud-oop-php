<?php
require_once('koneksi.php');
require_once('sql.php');

$obj = new crud;

// Pemeriksaan form sebelum eksekusi operasi CRUD
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Pemeriksaan input form
    if (isset($_POST['nim']) && isset($_POST['nama_mahasiswa'])) {
        $nim = $_POST['nim'];
        $nama = $_POST['nama_mahasiswa'];
        if (!empty($nim) && !empty($nama)) {
            if ($obj->insertData($nim, $nama)) {
                echo '<div class="alert alert-success">Data berhasil disimpan</div>';
            } else {
                echo '<div class="alert alert-danger">Data tidak berhasil disimpan</div>';
            }
        } else {
            echo '<div class="alert alert-danger">Isi semua bidang</div>';
        }
    } else {
        echo '<div class="alert alert-danger">Isi semua bidang</div>';
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>CRUD OOP PHP</title>
    <link href="fontawesome-free-6.4.2-web/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="container">
        <div class="card shadow mb-4 mt-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-danger"> CRUD OOP PHP </h6>
            </div>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>NIM :</label>
                                <input type="text" class="form-control" name="nim" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>NAMA MAHASISWA :</label>
                                <input type="text" class="form-control" name="nama_mahasiswa" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="mt-4 btn btn-md btn-success"> Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
            <?php
            // Menampilkan pesan jika tidak ada data
            if ($obj->tampilMahasiswa()->num_rows == 0) {
                echo '<div class="alert alert-info">Tidak ada data yang ditampilkan</div>';
            } else {
            ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NIM</th>
                            <th>NAMA MAHASISWA</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $data = $obj->tampilMahasiswa();
                        while ($row = $data->fetch_array()) {
                        ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $row['nim']; ?></td>
                                <td><?php echo $row['nama_mahasiswa']; ?></td>
                                <td>
                                    <a class='btn btn-sm btn-secondary' href='edit.php?id_mahasiswa=<?php echo $row['id_mahasiswa']; ?>'>edit</a>
                                    <a class='btn btn-sm btn-danger' href='delete.php?id_mahasiswa=<?php echo $row['id_mahasiswa']; ?>'>delete</a>
                                </td>
                            </tr>
                        <?php
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </div>
    <script src="bootstrap-5.3.2-dist/js/bootstrap.min.js"></script>
</body>

</html>
