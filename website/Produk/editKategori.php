<?php

include("../database.php");

$sql = "UPDATE kategori
        SET nama_kategori = '{$_POST['katName']}'
        WHERE id_ktg = '{$_POST['id']}'";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
    echo $conn->error;
}
header("Location: ketegori.php");

?>