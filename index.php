<?php
    // include("database.php");
    // include("header.php");
    // session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/84520cd5ff.js" crossorigin="anonymous"></script>
    <title>Index</title>
</head>
<body>
<div class="shadow rounded p-5 text-white bb border border-2">
    <div>
        <h1 class="text-center bold">Sign In</h1>
    </div>
    
    <div class="d-flex justify-content-center p-3">
        
            <Form class="text-white">
                <div class="mx-3 my-3 border rounded-pill p-3 act">
                <input type="text" namespace = "Username" id = "Username" placeholder="Username" class="text-white">
                <i class="fa-regular fa-user mx-1"></i>
                </div>
                <div class="mx-3 my-3 border rounded-pill p-3 act">
                <input type="password" namespace = "Password" id = "Password" placeholder="Password" class="text-white">
                <i class="fa-regular fa-eye"></i> 
            </div>
                <div class="row mt-4 text-center mb-3">
                    <div class="col-sm-6 mb-3">
                        <button class="border rounded-pill p-2 px-3">Log In</button> 

                    </div>
                    <div class="col-sm-6">
                        <button class="border rounded-pill p-2 px-3">Sign Up</button>
                    </div>
        
        </form>
            
            
        
        </div>
   
        
    </div>
</div>

    
</body>
</html>
<?php
    // if($_SERVER["REQUEST_METHOD"] == "POST"){
    //     if(isset($_POST["regis"])){
    //         $NRP = htmlspecialchars($_POST["NRP"]);
    //         $nama = htmlspecialchars($_POST["user"]);
    //         $password = htmlspecialchars($_POST["password"]);
    //         $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    //         if(empty($NRP)){
    //             echo "NRP tidak boleh kosong ! ! !";
    //         }
    //         if(empty($nama)){
    //             echo "nama tidak boleh kosong ! ! !";
    //         }
    //         if(empty($password)){
    //             echo "password tidak boleh kosong ! ! !";
    //         }
    //         if(empty($email)){
    //             echo "email masih kosong atau salah";
    //         }
    //         if(!empty($NRP) && !empty($nama) && !empty($password) && !empty($email)){
    //             $hash = password_hash($password, PASSWORD_DEFAULT);
    //             $sql = "INSERT INTO users(NRP, nama,email,password) VALUES('$NRP','$nama', '$email', '$hash')";
    //             try{
    //                 mysqli_query($conn , $sql);
    //                 echo "Register SUKSES";
    //             }
    //             catch(mysqli_sql_exception){
    //                 echo "email ATAU NRP sudah didaftarkan";
    //             }
    //         }
    //     }
    //     elseif(isset($_POST["login"])){
    //         $NRP = $_POST["NRP"];
    //         $nama = $_POST["user"];
    //         $password = $_POST["password"];
    //         $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    //         echo $NRP;
    //         echo $nama;
    //         echo $password;
    //         echo $email;
    //         if(!empty($NRP) && !empty($nama) && !empty($password) && !empty($email)){
    //             $sql = "SELECT * FROM users WHERE NRP = '$NRP' AND nama = '$nama'";
    //             $result = mysqli_query($conn, $sql);
    //             if(mysqli_num_rows($result) > 0){
    //                 $row = mysqli_fetch_assoc($result);
    //                 if(password_verify($password, $row["password"]) 
    //                     && $email == $row["email"]){
    //                     echo "ANDA BERHASIL LOGIN";
    //                     $_SESSION["user"] = $_POST["user"];
    //                     header("Location: login.php");
    //                     exit();
    //                 }
    //                 else{
    //                     echo "email atau pssword salah, SILAHKAN COBA KEMBALI ! ! !";
    //                 }
    //             }
    //             else {
    //                 echo "User tidak ditemukan. Silakan coba kembali atau daftar jika belum memiliki akun.";
    //             }
    //         }
    //         else{
    //             echo "MOHON ISI BAGIAN YANG KOSONG";
    //         }
    //     }
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
        
    // }
    // mysqli_close($conn);
?>
