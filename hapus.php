<?php

include('koneksi.php');

$id = $_GET['idhapus'];

$hapus = $koneksi->query("DELETE  FROM produk WHERE produk_id = '$id' ");

if ($hapus == TRUE) {
    echo "<script>
            alert('Data Berhasil dihapus')
            window.location = 'index.php'
        </script>";
} else {
    echo "<script>
            alert('Data Gagal dihapus')
            window.location = 'hapus.php/hapus&idhapus= " . $id . "'
        </script>";
}
