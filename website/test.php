<?php
    $pass = 'xneine';
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    echo $pass;
    echo "<br>".$hash;
?>