<?php
    include'koneksi.php';

    $query = "SELECT * FROM tb_siswa;";
    $sql = mysqli_query($conn, $query);
    $no = 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <!--Bootstrap-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
<script src="js/bootstrap.bundle.min.js"></script>

    <!--FontAwesome-->
<link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sekolah</title>
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            CRUD SEKOLAH
          </a>
        </div>
      </nav>
      <!--Judul-->
      <div class="container">
        <h1 class="mt-4">DATA SISWA</h1>
      <figure>
        <blockquote class="blockquote">
          <p>Data yang disimpan di database.</p>
        </blockquote>
        <figcaption class="blockquote-footer">
          CRUD <cite title="Source Title">Creat Read Update Delete</cite>
        </figcaption>
      </figure>
    <a href="kelolah.php" type="button" class="btn btn-success">
        <i class="fa fa-plus"></i>
        Tambah Data
    </a>
      <div class="table-responsive">
        <table class="table align-middle table-hover">
          <thead>
            <tr>
              <th><center>No.</center></th>
              <th>NISN</th>
              <th>Nama Siswa</th>
              <th>Jenis Kelamin</th>
              <th>Foto Siswa</th>
              <th>Alamat</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while($result = mysqli_fetch_assoc($sql)){
            ?>
            <tr>
              <td><center>
                <?php
                 echo ++$no;
                ?>.
              </center>
            </td>
              <td><?php
                 echo $result['nisn'];
                ?>
                </td>
              <td><?php
                 echo $result['nama_siswa'];
                ?>
                </td>
              <td><?php
                 echo $result['Jenis_kelamin'];
                ?>
                </td>
              <td>
                <img src="img/<?php
                 echo $result['foto_siswa'];
                ?>" style="width: 120px;">
              </td>
              <td><?php
                 echo $result['alamat'];
                ?></td>
              <td>
                <a href="kelolah.php?ubah=<?php
                 echo $result['id_siswa'];
                ?>" type="button" class="btn btn-primary btn-sm">
                    <i class="fa fa-pencil"></i>
                </a>
                <a href="proses.php?hapus=<?php
                 echo $result['id_siswa'];
                ?>" type="button" class="btn btn-danger btn-sm" onClick = "return confirm('Apakah Anda yakin menghapus data tersebut???')">
                      <i class="fa fa-trash"></i>
                  </a>
              </td>
            </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
      </div>
</body>
</html>