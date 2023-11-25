<?php
    include("database.php");
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        echo '<script type="text/javascript">alert("1!");</script>';
            $username = htmlspecialchars($_POST["user"]);
            $password = htmlspecialchars($_POST["pass"]);
            $sql = "SELECT * FROM user WHERE username = '$username'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_assoc($result);
                if(password_verify($password, $row["password"])){
                    echo '<script type="text/javascript">alert("Anda Berhasil Login!");</script>';
                    $_SESSION["user"] = htmlspecialchars($_POST["user"]);
                    header("Location: login.php");
                    exit();
                }
                else{
                    echo '<script type="text/javascript">alert("password salah!");</script>';
                }
            }
            else {
                echo '<script type="text/javascript">alert("user tidak ditemukan!");</script>';
            }  
    }
    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/84520cd5ff.js" crossorigin="anonymous"></script>
    <title>Index</title>
    <!-- <script>
        $(document).ready(function(){
            $("#bruh").click(function(){
                if($("#Password").attr("type") === "password"){
                    $("#Password").attr("type","text")
                }
                else if ($("#Password").attr("type") === "text"){
                    $("#Password").attr("type","password")
                }
                if ($("#bruh").attr("class") === "bi bi-eye-slash"){
                    $("#bruh").attr("class", "bi bi-eye")
                }
                else if ($("#bruh").attr("class") === "bi bi-eye"){
                    $("#bruh").attr("class", "bi bi-eye-slash")
                }
                
            })
            $("#chil").click(function(){
                if ($("#chil").attr("class") === "bi bi-eye-slash"){
                    $("#chil").attr("class", "bi bi-eye")
                }
                else if ($("#chil").attr("class") === "bi bi-eye"){
                    $("#chil").attr("class", "bi bi-eye-slash")
                }
                if($("#confirm").attr("type") === "password"){
                    $("#confirm").attr("type","text")
                }
                else if ($("#confirm").attr("type") === "text"){
                    $("#confirm").attr("type","password")
                }
            })
            // $("#signup").click(function(){
            //     var pass = $("#Password").val()
            //     var confirm = $("#confirm").val()
            //     if (pass !== confirm){
            //         alert("Password Don't Match")
            //     }
            // })


        });

    </script> -->
</head>
<body>
<div class="shadow rounded p-5 text-white bb border border-2">
    <div>
        <h1 class="text-center bold">Sign In</h1>
    </div>
    
    <div class="d-flex justify-content-center p-3">
        
            <Form class="text-white" action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                <div class="mx-3 my-3 border rounded-pill p-3 act ">
                <input type="text" namespace = "Username" id = "Username" placeholder="Username" class="text-white" required name="user">
                <div class="d-md-inline d-none">
                <i class="fa-regular fa-user mx-1"></i>
                </div>
                
                </div>
                <div class="mx-3 my-3 border rounded-pill p-3 act ">
                <input type="password" namespace = "Password" id = "Password" placeholder="Password" class="text-white" required name="pass">
                <div  class="d-md-inline d-none">
                <i class="fa-regular fa-eye"></i>
                </div>
                
            </div>
            <div  class="text-white">
                <p id="confirm"></p>
            </div>
                <div class="row mt-4 text-center mb-3">
                    <div class="col-sm-6 mb-3 hh">
                        <input type="submit" class="btn border rounded-pill p-2 px-3"  value="Login" id="Login">
                    </div>
                    <div class="col-sm-6 hh">
                        <a href="register_1_2.php" class="btn border rounded-pill p-2 px-3">Sign Up</a>
                    </div>
        </form>
                
        </div>
   
        
    </div>
</div>

    <script src="index.js"></script>
</body>
</html>
