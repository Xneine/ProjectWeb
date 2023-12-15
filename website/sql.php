<?php
include("database.php");
?>
<?php
$transaksi = mysqli_query($conn, "SELECT * FROM transaksi");
while ($hehe = mysqli_fetch_array($transaksi)) :
    $produk = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '$hehe[id_produk]'");
    $row = mysqli_fetch_assoc($produk);
    try{
        $query = mysqli_query($conn, 
        "UPDATE TRANSAKSI
        SET total = jumlah * '$row[harga]'
        WHERE id_transaksi = '$hehe[id_transaksi]';");
        echo "berhasil";
    }
    catch(mysqli_sql_exception){
        echo "error";
    }
endwhile; ?>
