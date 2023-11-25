<?php
    include("database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/84520cd5ff.js" crossorigin="anonymous"></script>
    <script>
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

    </script>
    
    
    <title>Register</title>
</head>
<body>
<div class="shadow rounded p-5 text-white bb border border-2">
    <div>
        <h1 class="text-center bold">Sign Up</h1>
    </div>
    
        <div class="d-flex justify-content-center p-3">
        
            <Form class="text-white" action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                <!-- fullname & username -->
                <div class="row justify-content-center mb-3">
                    <div class="col-8 col-md  my-2  my-md-0 border rounded-pill p-3 act ">
                    <span class="d-none d-md-inline">
                                <i class="bi bi-person-vcard"></i>
                            </span>
                
                        <input type="text" namespace = "Fullname" id = "fullName" placeholder="Full Name" class="text-white"  required name="full">
                
                        
                           
                            
                    
                    </div>
                    <div class="col-8 col-md  my-2  my-md-0 border rounded-pill p-3 act ">
                         <span class="d-none d-md-inline">
                                <i class="fa-regular fa-user"></i>
                            </span>
                    
                        <input type="text" namespace = "Username" id = "Username" placeholder="Username" class="text-white"  required
                        name="user">
                        
                           
                    </div>
                </div>
                    <!-- buat pass bek confirm -->
                    <div class="row justify-content-center  mb-3">

                
                        <div class="col-8 col-md my-2 my-md-0 border rounded-pill p-3 act ">
                            <div  class="d-md-inline d-none">
                                <span>
                                    <i class="bi bi-eye-slash" id="bruh"></i>
                                </span>
                                
                            </div>  

                            <input type="password" namespace = "Password" id = "Password" placeholder="Password" class="text-white"  required name="pass1">
                        </div>
                        <div class="col-8 col-md my-2 my-md-0 border rounded-pill p-3 act ">
                            <div  class="d-md-inline d-none">
                                <span>
                                    <i class="bi bi-eye-slash" id="chil"></i>
                                </span>
                                
                            </div>  

                            <input type="password" namespace = "Password" id = "confirm" placeholder="Confirm Password" class="text-white" required
                            name="pass2">
                        </div>
            
                    </div>
                <!-- buat email bek phone -->
                    <div class="row justify-content-center  mb-3">
                    <div class="col-md col-8 my-2 my-md-0 border rounded-pill p-3 act ">
                        
                            <span class="d-none d-md-inline-block">
                                <i class="bi bi-envelope"></i>
                            </span>
                            
                        
                        <input type="email" namespace = "email" id = "Email" placeholder="Email" class="text-white"  required
                        name="email">
                
                    </div>
                    <div class="col-md col-8 my-2 my-md-0 border rounded-pill p-3 act ">
                    <span class="d-none d-md-inline-block">
                        <i class="bi bi-telephone"></i>
                    </span>
                        <input type="phone" namespace = "phone" id = "phone" placeholder="Phone" class="text-white" required
                        name="phone">
                        
                    </div>

                     
                    </div>
                    <div class="row justify-content-center mb-3 text-center">
                    <label for="birth">Date Of Birth</label>
                        
                        <div class="col-8 my-2 my-md-0 border rounded-pill p-3 act text-center">
                        
                        <input type="date" id="birth" value="2023-12-12" class="text-white" name="birth">
                        </div>
                        
                     </div>
                    <div class="row justify-content-center mb-3 text-center">
                    <label for="address">Address</label>
                        
                        <div class="col-8 my-2 my-md-0 border rounded-pill p-3 act text-center">
                        
                       <input type="textarea" id="address" class="text-white" name="add">
                        </div>
                        
                     </div>
            
                <div  class="text-white">
                    <p id="confirm"></p>
                </div>
                    <div class="mt-4 text-center  mb-3">
                   
                        <div class="hh">
                        <a href="index_1_2.php" class="btn border rounded-pill p-2 px-3">Log In</a>    
                        <input type="submit" class="btn border rounded-pill p-2 px-3"  value="Sign Up" id="signup">
                        </div>
                    </div>
            </form>
            </div>
        </div>
    <script src="index.js"></script>
</body>
</html>
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        echo '<script type="text/javascript">alert("1!");</script>';
            echo '<script type="text/javascript">alert("2!");</script>';
            $full_name = htmlspecialchars($_POST["full"]);
            $username = htmlspecialchars($_POST["user"]);
            $password1 = htmlspecialchars($_POST["pass1"]);
            $password2 = htmlspecialchars($_POST["pass2"]);
            $phone = htmlspecialchars($_POST["phone"]);
            $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
            $birth = $_POST["birth"];
            $address = htmlspecialchars($_POST["add"]);
            if ($password1 !== $password2){
                echo '<script type="text/javascript">alert("password tidak sama!");</script>';
            }
            else{            
                $hash = password_hash($password1, PASSWORD_DEFAULT);
                $sql = "INSERT INTO user(username, nama_lengkap,email,phone,birth,address,password) VALUES('$username','$full_name', '$email', '$phone', '$birth', '$address' , '$hash')";
                try{
                    mysqli_query($conn , $sql);
                    echo '<script type="text/javascript">alert("REGISTER SUKSES!");</script>';
                }
                catch(mysqli_sql_exception){
                    echo '<script type="text/javascript">alert("REGISTER GAGAL!");</script>';
                }
            }      
    }
    mysqli_close($conn);
?>
