<?php
session_start();
include('nonaktif.php');
include("../database.php");
if (isset($_POST['btambah'])) {
    try {
        $tambah = mysqli_query($conn, "INSERT INTO temp_trans(id_produk, jumlah) VALUES('$_POST[nproduk]', '$_POST[njumlah]')");
        echo '<script>
        alert("SIMPAN SUKSES!");
        document.location="transaksi_p.php";
    </script>';
    } catch (mysqli_sql_exception) {
        echo '<script>
        alert("TAMBAH GAGAL ADA (BARANG SUDAH DITAMBAHKAN)!");
        document.location="transaksi_p.php";
    </script>';
    }
}
if (isset($_POST['bhapus'])) {
    try {
        $hapus = mysqli_query($conn, "DELETE FROM temp_trans
        WHERE id_temp = ('$_POST[idtemp]')");
        echo '<script>
                alert("DELETE KERANJANG SUKSES!");
                document.location="transaksi_p.php";
            </script>';
    } catch (mysqli_sql_exception) {
        echo '<script>
            alert("DELETE DATA GAGAL!");
            document.location="transaksi_p.php";
        </script>';
    }
}
if (isset($_POST['bbayar'])) {
    try {
        $updateProduk = mysqli_query(
            $conn,
            "UPDATE produk
            INNER JOIN temp_trans ON produk.id_produk = temp_trans.id_produk
            SET produk.stok = produk.stok - temp_trans.jumlah"
        );
        $updateTransaksi = mysqli_query(
            $conn,
            "INSERT INTO transaksi (tanggal, id_produk, jumlah)
            SELECT CURRENT_TIMESTAMP, id_produk, jumlah FROM temp_trans;"
        );
        $delete = mysqli_query($conn, "DELETE FROM temp_trans");
        echo '<script>
        alert("TRANSAKSI SUKSES!");
        document.location="transaksi_p.php";
    </script>';
    } catch (mysqli_sql_exception) {
        echo '<script>
        alert("TRANSAKSI GAGAL!");
        document.location="transaksi_p.php";
    </script>';
    }
}
?>
