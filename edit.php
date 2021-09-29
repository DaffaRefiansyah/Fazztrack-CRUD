<?php
include('koneksi.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Produk</title>
</head>

<body>

    <?php

    $id = $_GET['idedit'];

    $dataEdit = $koneksi->query("SELECT * FROM produk WHERE produk_id = '$id'")->fetch_assoc();

    ?>

    <div class="container">
        <div class="card mt-3">
            <div class="card-header bg-primary">
                <h1>Edit Data Produk</h1>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" name="nama" class="form-control" value="<?= $dataEdit['nama_produk']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" name="ket" class="form-control" value="<?= $dataEdit['keterangan']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Harga Produk</label>
                        <input type="number" name="harga" class="form-control" value="<?= $dataEdit['harga']; ?>">
                    </div>

                    <div class="form-row">
                        <div class="col form-group">
                            <label>Jumlah Produk</label>
                            <input type="number" name="jumlah" class="form-control" value="<?= $dataEdit['jumlah']; ?>">
                        </div>

                        <button type="submit" name="edit" class="btn btn-success btn-block mt-2">Simpan Data</button>

                </form>

                <?php

                if (isset($_POST['edit'])) {
                    $nama       = $_POST['nama'];
                    $ket       = $_POST['ket'];
                    $harga      = $_POST['harga'];
                    $jumlah      = $_POST['jumlah'];

                    $edit = $koneksi->query("UPDATE produk
                    SET nama_produk = '$nama', keterangan = '$ket', harga = '$harga', jumlah = '$jumlah'
                    WHERE produk_id = '$id' ");

                    if ($edit == TRUE) { //jika query simpan benar maka
                        echo "<script>
                                alert('Data Berhasil Disimpan')
                                window.location = 'index.php'
                            </script>"; // akan menampilkan pesan serta berpindah kehalaman tampilan data barang

                    } else { //jika query simpan salah maka
                        echo "<script>
                            alert('Data Gagal Disimpan')
                            window.location = 'edit.php'
                        </script>";  // akan menampilkan pesan serta berpindah kehalaman form simpan 
                    }
                }

                ?>


            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

</html>