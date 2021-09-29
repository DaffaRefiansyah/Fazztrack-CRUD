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

    <div class="container">
        <div class="card mt-3">
            <div class="card-header bg-primary">
                <h1>Tambah Data Produk</h1>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" name="nama" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" name="ket" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Harga Produk</label>
                        <input type="number" name="harga" class="form-control">
                    </div>

                    <div class="form-row">
                        <div class="col form-group">
                            <label>Jumlah Produk</label>
                            <input type="number" name="jumlah" class="form-control">
                        </div>

                        <button type="submit" name="simpan" class="btn btn-success btn-block mt-2">Simpan Data</button>

                </form>

                <?php
                if (isset($_POST['simpan'])) { // kondisi dimana apabila ada tombol simpan maka
                    $nama       = $_POST['nama'];
                    $ket       = $_POST['ket'];
                    $harga      = $_POST['harga'];
                    $jumlah      = $_POST['jumlah'];

                    $simpan = $koneksi->query("INSERT INTO produk(
                        nama_produk,
                        keterangan,
                        harga,
                        jumlah) VALUES ('$nama','$ket','$harga','$jumlah')");
                    // query menyimpan data kedalam table produk 

                    if ($simpan == TRUE) { //jika query simpan benar maka
                        echo "<script>
                                alert('Data Berhasil Disimpan')
                                window.location = 'index.php'
                            </script>"; // akan menampilkan pesan serta berpindah kehalaman tampilan data barang

                    } else { //jika query simpan salah maka
                        echo "<script>
                            alert('Data Gagal Disimpan')
                            window.location = 'tambah.php'
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