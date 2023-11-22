<?php
    include("database.php");
    include("header.php");
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Index</title>
</head>
<body class="m-1 bg-dark text-light">
    <form class="m-3" action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
        <div class="row">
            <div class="col-2">NRP: </div>
            <div class="col">        
                <input type="text" name="NRP">
            </div>
        </div>
        <div class="row">
            <div class="col-2">nama: </div>
            <div class="col">        
                <input type="text" name="user">
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                email
            </div>
            <div class="col">
                <input type="email" name="email"><br>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                password: 
            </div>
            <div class="col">
                <input type="password" name="password"><br>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-2">
                <input type="submit" name="regis" value="register">
            </div>
            <div class="col-2">
                <input type="submit" name="login" value="login"><br>
            </div>
        </div>
    </form>
</body>
</html>
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST["regis"])){
            $NRP = htmlspecialchars($_POST["NRP"]);
            $nama = htmlspecialchars($_POST["user"]);
            $password = htmlspecialchars($_POST["password"]);
            $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
            if(empty($NRP)){
                echo "NRP tidak boleh kosong ! ! !";
            }
            if(empty($nama)){
                echo "nama tidak boleh kosong ! ! !";
            }
            if(empty($password)){
                echo "password tidak boleh kosong ! ! !";
            }
            if(empty($email)){
                echo "email masih kosong atau salah";
            }
            if(!empty($NRP) && !empty($nama) && !empty($password) && !empty($email)){
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO users(NRP, nama,email,password) VALUES('$NRP','$nama', '$email', '$hash')";
                try{
                    mysqli_query($conn , $sql);
                    echo "Register SUKSES";
                }
                catch(mysqli_sql_exception){
                    echo "email ATAU NRP sudah didaftarkan";
                }
            }
        }
        elseif(isset($_POST["login"])){
            $NRP = $_POST["NRP"];
            $nama = $_POST["user"];
            $password = $_POST["password"];
            $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
            echo $NRP;
            echo $nama;
            echo $password;
            echo $email;
            if(!empty($NRP) && !empty($nama) && !empty($password) && !empty($email)){
                $sql = "SELECT * FROM users WHERE NRP = '$NRP' AND nama = '$nama'";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0){
                    $row = mysqli_fetch_assoc($result);
                    if(password_verify($password, $row["password"]) 
                        && $email == $row["email"]){
                        echo "ANDA BERHASIL LOGIN";
                        $_SESSION["user"] = $_POST["user"];
                        header("Location: login.php");
                        exit();
                    }
                    else{
                        echo "email atau pssword salah, SILAHKAN COBA KEMBALI ! ! !";
                    }
                }
                else {
                    echo "User tidak ditemukan. Silakan coba kembali atau daftar jika belum memiliki akun.";
                }
            }
            else{
                echo "MOHON ISI BAGIAN YANG KOSONG";
            }
        }
        // elseif(isset($_POST["login"])){
        //     $NRP = $_POST["NRP"];
        //     $nama = $_POST["user"];
        //     $password = $_POST["password"];
        //     $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
            
        //     if(!empty($NRP) && !empty($nama) && !empty($password) && !empty($email)){
        //         $sql = "SELECT * FROM users WHERE NRP = '$NRP' AND nama = '$nama'";
        //         $result = mysqli_query($conn, $sql);
                
        //         if(mysqli_num_rows($result) > 0){
        //             $row = mysqli_fetch_assoc($result);
                    
        //             if(password_verify($password, $row["password"]) && $email == $row["email"]){
        //                 echo "ANDA BERHASIL LOGIN";
        //                 $_SESSION["user"] = $nama;
        //                 header("Location: login.php");
        //                 exit(); // Penting untuk menghentikan eksekusi skrip setelah mengarahkan pengguna
        //             } else {
        //                 echo "ANDA GAGAL LOGIN, SILAHKAN COBA KEMBALI ! ! !";
        //             }
        //         } else {
        //             echo "User tidak ditemukan. Silakan coba kembali atau daftar jika belum memiliki akun.";
        //         }
        //     } else {
        //         echo "Harap isi semua kolom dengan benar.";
        //     }
        // }
        
    }
    mysqli_close($conn);
?>