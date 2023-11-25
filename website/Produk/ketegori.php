<?php
    include("../database.php");
    session_start();
    function modalAdd($methodd){
        $_SESSION['method1'] = $methodd;
        $_SESSION['entity1'] = 'kategori';
        include('modalAdd.php');
    }
    function modalEdit($method, $id_ktg) {
        $_SESSION['method2'] = $method;
        $_SESSION['entity2'] = 'kategori';
        $_SESSION['id_ktg'] = $id_ktg;
        include('modalEdit.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="produkStyle.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </script>
</head>
</head>
<body>
  <div class="container-fluid">
        <div class="row flex-nowrap">
          <?php
          include("../header.php");
          ?>
            <div class="col py-3 pageBackground">
                <h1>
                    KATEGORI PRODUK
                    <div class="card textMedium" >
                        <ul class="list-group list-group-flush textSmall">
                            <li class="list-group-item">
                                <?php
                                modalAdd('Add');
                                ?>
                                <?php
                                modalAdd('Anying');
                                ?>
                            </li>
                            <li class="list-group-item showshow">
                                <!-- Table -->
                                <?php
                                echo "
                                <table class='table'>
                                <thead>
                                    <tr>
                                    <th scope='col' class='col-1'>ID</th>
                                    <th scope='col'class='col-9'>Kategori</th>
                                    <th scope='col' class='col-2' colspan='2'>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                ";
                                $result = mysqli_query($conn,"SELECT * FROM kategori");
                                $temp = 0;
                                while($row = mysqli_fetch_array($result))
                                {
                                    $temp++;
                                    //STOP UNDO
                                    echo "
                                    <tr>
                                        <td>{$row['id_ktg']}</td>
                                        <td>{$row['Nama_Kategori']}</td>
                                        <td>
                                            <a href='?kode=$row[id_ktg]'>
                                                <button type='button' class='btn btn-danger'>Delete</button>
                                            </a>
                                        </td>
                                        <td>
                                            ";
                                    modalEdit('Edit', $row['id_ktg']);
                                    echo "
                                        </td>
                                    </tr>
                                    ";
                                // echo "<tr>".$row['id_ktg'] . " - " . $row['Nama_Kategori']; //these are the fields that you have stored in your database table employee
                                }
                                if($temp == 0){
                                    echo "
                                    <tr> 
                                    <th scope='row'></th>
                                    <td >Tidak ada data tersedia </td>
                                    </tr>
                                    ";
                                }
                                echo "
                                </tbody>
                                </table>
                                ";
                                ?>
                            </li>
                        </ul>
                    </div>
                    <br>
                    <?php
                        // echo $_SESSION["user"];
                    ?>
                 </h1>
            </div>
        </div>
    </div>
    <!-- <script>
    function modalEdit(method, id_ktg) {
        $('#id_ktg').val(id_ktg); // Setel nilai input hidden dengan id_ktg
        $('#editModalLabel').text(`${method} kategori ID: ${id_ktg}`);
        $('#EDIT').modal('show');
    }
</script> -->
</body>
</html>
<?php
    if(isset($_GET['kode'])){
        mysqli_query($conn, "DELETE FROM kategori WHERE id_ktg = '$_GET[kode]'");
        echo '<script type="text/javascript">alert("Data BERHASIL dihapus!");</script>';
        echo "<meta http-equiv=refresh content=2;URL='ketegori.php'>";
    }

    // if($_SERVER["REQUEST_METHOD"] == "POST"){
    //     session_destroy();
    //     header("Location: index.php");
    //     exit();
    // }
?>