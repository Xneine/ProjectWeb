<?php

include("../database.php");

$sql = "INSERT INTO kategori (Nama_Kategori)
VALUES ('{$_POST['katName']}')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
    echo $conn->error;
}
header("Location: ketegori.php");

?>