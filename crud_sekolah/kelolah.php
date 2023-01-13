<!DOCTYPE html>

<?php
    include'koneksi.php';

    if(isset($_GET['ubah'])){
      $id_siswa = $_GET['ubah'];
      
      $query ="SELECT * FROM tb_siswa WHERE id_siswa = '$id_siswa';";
      $sql = mysqli_query($conn, $query);

      $result = mysqli_fetch_assoc($sql);

      $nisn = $result['nisn'];
      $nama_siswa = $result['nama_siswa'];
      $Jenis_kelamin = $result['Jenis_kelamin'];
      $alamat = $result['alamat'];

    }
?>

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
    <nav class="navbar navbar-light bg-light mb-4">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            CRUD SEKOLAH
          </a>
        </div>
      </nav>
      <div class="container">
        <form method="POST" action="Proses.php" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $id_siswa; ?>" name="id_siswa">
        <div class="mb-3 row">
            <label for="nisn" class="col-sm-2 col-form-label">
                NISN
            </label>
            <div class="col-sm-10">
              <input required type="text" name="nisn" class="form-control" id="nisn" placeholder="Ex : 202301099 " value="<?php $nisn; ?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">
                Nama Siswa
            </label>
            <div class="col-sm-10">
              <input required type="text" name="nama_siswa" class="form-control" id="nama" placeholder="Ex : Dono " value="<?php $nama_siswa; ?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="jkel" class="col-sm-2 col-form-label">
                Jenis Kelamin
            </label>
            <div class="col-sm-10">
                <select value="<?php $Jenis_kelamin; ?>" required id="jkel" name="Jenis_kelamin"class="form-select">
                    <option  value="Laki-laki">laki-laki</option>
                    <option  value="Perempuan">Perempuan</option>
                  </select>
                </div>
          </div>
          <div class="mb-3 row">
            <label for="foto" class="col-sm-2 col-form-label">
                Foto Siswa
            </label>
            <div class="col-sm-10">
                <input <?php if(!isset($_GET['ubah'])){ echo "required";} ?> class="form-control" type="file" name="foto" id="foto" accept="image/*">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="Alamat" class="col-sm-2 col-form-label">
                Alamat Lengkap
            </label>
            <div class="col-sm-10">
                <textarea required class="form-control" id="Alamat" name="alamat" rows="3"><?php $alamat; ?></textarea>
            </div>
          </div>
          <div class="mb-3 row mt-4">
            <div class="col">
              <?php
                if(isset($_GET['ubah'])){
              ?>
                  <button type="submit" name="aksi" value="edit" class="btn btn-primary">
                      <i class="fa fa-floppy-o" aria-hidden="true"></i>
                      Simpan Perubahan
                  </button>
                <?php
                } else {
                ?>
                <button type="submit" name="aksi" value="add" class="btn btn-primary">
                      <i class="fa fa-floppy-o" aria-hidden="true"></i>
                      Tambahkan
                  </button>
                <?php
                  }
                ?>
                <a href="index.php" type="button" class="btn btn-danger">
                <i class="fa fa-ban" aria-hidden="true"></i>
                    Batal
                </a>
            </div>
        </form>
      </div>
</body>
</html>