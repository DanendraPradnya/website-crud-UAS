<?php
include_once("koneksi.php");
 
// Mengambil semua data dari database
if(isset($_POST["submit"])){
    $nama = $_POST["nama"];
    $jurusan = $_POST["jurusan"];
    $universitas = $_POST["universitas"];
    $telepon = $_POST["no_telpon"];


    $add = mysqli_query($mysqli, "INSERT INTO absensi(nama, jurusan, universitas, no_telpon) 
    VALUES ('$nama','$jurusan','$universitas','$telepon')");

}


if(isset($_POST["hapus"])){
    $delete = mysqli_query($mysqli,"DELETE FROM absensi");
    if(!$delete){
        echo "<script>alert('Gagal menghapus data !')</script>";
    }else{
        echo "<script>window.location.href = 'index.php'</script>";
    }
}


?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style/error.css">
    <title>DAFTAR PESERTA WEBINAR</title>
</head>
 
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">DAFTAR PESERTA WEBINAR</span>
        </div>
    </nav>
 
    <div class="bg-secondary p-2 text-dark bg-opacity-10">
        <h1 class="p-4 text-center fw-bolder">IDENTITAS PESERTA   </h1>
        <div class="container">
            <form action="" method="post" id="formValidate" name="form_absen">
                <div class="col-md-6 offset-md-3">
                    <div class="mb-3">
                        <label class="form-label ">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jurusan</label>
                        <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Masukkan Jurusan">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Universitas</label>
                        <input type="text" class="form-control" id="universitas" name="universitas" placeholder="Asal Universitas">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No Telepon</label>
                        <input type="text" class="form-control" id="no_telpon" name="no_telpon" placeholder="No telepon">
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary" id="daftar" name="submit">Daftar</button>
                </div>
            </form>
                 <form action="action.php" id="delete" method="post">
                    <button class="btn btn-danger" id="reset" name="hapus">Hapus</button>
                </form>

 
            <table class="my-5 table table-striped">
                <tr class="table-dark">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Universitas</th>
                    <th>Telepon</th>
                </tr>
 
                <?php
                // Mengambil semua data dari database
                $i = 1;
                $result = mysqli_query($mysqli, "SELECT * FROM absensi ORDER BY id DESC");
                while ($data = mysqli_fetch_array($result)) {
                ?>
                    <tr class="table-primary">
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $data['nama']; ?></td>
                        <td class="text-capitalize"><?php echo $data['jurusan']; ?></td>
                        <td class="text-capitalize"><?php echo $data['universitas']; ?></td>
                        <td><?php echo $data['no_telpon']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
 
    <script src="script/bootstrap.bundle.min.js"></script>
    <script src="script/jquery-3.7.1.js"></script>
    <script src="script/jquery.validate.js"></script>
    <script src="script/script.js"></script>
</body>
</html>