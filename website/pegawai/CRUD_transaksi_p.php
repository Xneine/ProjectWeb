<?php
session_start();
include('nonaktif.php');
include("../database.php");
if (isset($_POST['btambah'])) {
    try {
        $sql = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk= '$_POST[nproduk]'");
        $harga = mysqli_fetch_assoc($sql);
        $total = $_POST['njumlah'] * $harga['harga'];
        $tambah = mysqli_query($conn, "INSERT INTO temp_trans(id_produk, jumlah, total) VALUES('$_POST[nproduk]', '$_POST[njumlah]', '$total')");
        echo '<script>
        alert("SIMPAN SUKSES!");
        document.location="transaksi_p.php";
    </script>';
    } catch (mysqli_sql_exception $e) {
        try {
            $tambah = mysqli_query(
                $conn,
                "UPDATE temp_trans 
            SET jumlah = jumlah + '$_POST[njumlah]'
            WHERE id_produk = '$_POST[nproduk]'"
            );
            echo '<script>
            alert("BARANG BERHASIL DITAMBAHKAN!");
            document.location="transaksi_p.php";
        </script>';
        } catch (mysqli_sql_exception $e) {
            echo '<script>
            alert("TAMBAH GAGAL, TERJADI ERROR ATAU STOK SUDAH HABIS!");
            document.location="transaksi_p.php";
        </script>';
        }
    }
}
if (isset($_POST['bedit'])) {
    try {
        $tambah = mysqli_query(
            $conn,
            "UPDATE temp_trans 
        SET jumlah = '$_POST[njumlahh]'
        WHERE id_temp = ('$_POST[idtemp]')"
        );
        echo '<script>
        alert("SIMPAN SUKSES!");
        document.location="transaksi_p.php";
    </script>';
    } catch (mysqli_sql_exception) {
        echo '<script>
            alert("TAMBAH GAGAL, ADA KESALAHAN PADA DATABASE!");
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
            "INSERT INTO transaksi (tanggal, id_produk, jumlah, total,pembayaran)
            SELECT CURRENT_TIMESTAMP, id_produk, jumlah, total, '$_POST[flexRadioDefault]' FROM temp_trans;"
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
