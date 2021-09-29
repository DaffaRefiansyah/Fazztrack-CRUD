<?php
include('koneksi.php');

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>

    <div class="container">
        <div class="card mt-3">
            <div class="card-header">
                <h1>Table Data Produk</h1>
            </div>
            <div class="card-body">
                <a href="tambah.php" class="btn btn-primary">Tambah Data</a>
                <table class="table mt-2">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nomor</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Harga Produk</th>
                            <th scope="col">Jumlah Produk</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        $ambil = $koneksi->query("SELECT * FROM produk");
                        $no = 1;
                        while ($row = $ambil->fetch_assoc()) {

                        ?>

                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $row['nama_produk']; ?></td>
                                <td><?= $row['keterangan']; ?></td>
                                <td><?= $row['harga']; ?></td>
                                <td><?= $row['jumlah']; ?></td>
                                <td>
                                    <a href="edit.php?idedit= <?= $row['produk_id']; ?>" class=" btn btn-warning mb-2 btn-block">Edit</a>
                                    <a href="hapus.php?idhapus= <?= $row['produk_id']; ?>" class="btn btn-danger btn-block">Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

</html>