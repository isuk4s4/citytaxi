<?php
require_once("../db/db.php");

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
    <?php 
     if(isset($_SESSION['log'])){
        $log = $_SESSION['log'];
        $query = "SELECT * FROM `users` where `uuid`='$log'";
        $run = mysqli_query($con,$query);
        if(mysqli_num_rows($run)> 0){echo "<script>location.href='../index.php?page=home';</script>";}
                }
    if(isset($_POST['uname']) and isset($_POST['password'])){
        if(empty($_POST['uname'])){
            $unameerror = "uname is empty";
        }
        if(empty($_POST['password'])){
            $passworderror = "Password is empty";
        }
        if(!empty($_POST['uname']) and !empty($_POST['password'])){
            $uname = mysqli_real_escape_string($con,$_POST['uname']);
            $password = mysqli_real_escape_string($con,$_POST['password']);
            $query = "SELECT * FROM `users` where `uname`='$uname' and `password`='$password'";
            $run = mysqli_query($con,$query);
            $rows = mysqli_num_rows($run);
            if($rows > 0){
                $row = mysqli_fetch_array($run);
                $uuid = $row["uuid"];
                $_SESSION['log'] = $uuid;
                if(isset($_SESSION['log'])){
                    echo "<script>location.href='../index.php';</script>";

                }
            }else{
                 $error = "Invalid credentials";
            }

    
        }
    }
    ?>
    <?php
    if(isset($error)){?>
    <div class="alert" style='font-family: roboto;'>
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <?php echo $error;?>
</div>
<?php }?>

    <div class="login">
        <div class="left__login">
            <img src="../assets/img/bg_login.png" class="left__img">
        </div>
        <div class="right">
            <div class="sub">
                <div class="logo">
                    <img src="../assets/img/logo.png" alt="">
                </div>
                <div class="inputs">
                    <form action="#" method="post">
                    <div class="input_class">
                        <label for="username">*Username</label>
                        <input type="text" name="uname" id="uname" placeholder="Enter You're username">
                        <div style='font-family: roboto;
    font-weight: 500;
    font-size: 13px;
    color: #ff6161;
    margin-top: 8px;'>
                            <?php if(isset($unameerror)){echo $unameerror;}?>
                        </div>
                    </div>
                    <div class="input_class">
                        <label for="password">*password</label>
                        <div style="display:flex;align-items: center;justify-content: right;">
                            <input type="password" name="password" id="password" placeholder="Enter You're passowrd">
                            <div style="position: absolute;margin-right: 10px;text-align: center;display: flex;align-items: center;">
                                <i class="bx bx-show" id="showhide"></i>
</div>


                        </div>
                        <div style='font-family: roboto;
    font-weight: 500;
    font-size: 13px;
    color: #ff6161;
    margin-top: 8px;'>

    <?php if(isset($passworderror)){echo $passworderror;}?>
</div>
                    <button class="login_btn">Login</div>
                    </form>
<a href="register.php">

    <button class="reg_btn">Register</div>
</a>

                </div>
            </div>
        </div>
    </div>
    <script>
        const showhide = document.getElementById("showhide");
        const pass = document.getElementById("password");

        showhide.addEventListener("click",()=>{
            if (pass.type == 'password') {
                pass.setAttribute('type', 'text');
                showhide.classList.add('bx-show');
} else {
    showhide.classList.remove('bx-show');
    showhide.classList.add('bx-hide');

pass.setAttribute('type', 'password');
}

        })
        
    </script>
</body>
</html>