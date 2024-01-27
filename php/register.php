<?php

require_once("../db/db.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
<?php 
function guidv4($data = null) {
    // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
    $data = $data ?? random_bytes(16);
    assert(strlen($data) == 16);

    // Set version to 0100
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    // Set bits 6-7 to 10
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    // Output the 36 character UUID.
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

     if(isset($_SESSION['log'])){
        echo "<script>location.href='../index.php';</script>";

    }
    if(isset($_POST['uname']) and isset($_POST['password'])and isset($_POST['email'])){
        if(empty($_POST['uname'])){
            $unameerror = "uname is empty";
        }
        if(empty($_POST['password'])){
            $passworderror = "Password is empty";
        }
        if(empty($_POST['email'])){
            $emailerror = "email is empty";
        }else{
            if(preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/", $_POST["email"])){
                if(!empty($_POST['uname']) and !empty($_POST['password']) and !empty($_POST['email'])){
                    $uname = mysqli_real_escape_string($con,$_POST['uname']);
                    $password = mysqli_real_escape_string($con,$_POST['password']);
                    $email = mysqli_real_escape_string($con,$_POST['email']);
                    $role = mysqli_real_escape_string($con,$_POST['role']);
                    $uuid = guidv4();
                    $sql = "INSERT INTO `users`(`uname`, `password`, `email`,`role`, `uuid`)
                    VALUES(
                        '$uname',
                        '$password',
                        '$email',
                        '$role',
                        '$uuid'
                    )";
                    $result = mysqli_query($con,$sql);
                    
                    if($result){
                        $_SESSION['log'] = $uuid;
                        echo "<script>location.href='../index.php?';</script>";
                    }
                }
            }else{
                $emailerror = "enter valid email";
}
        }
  
        
    }
    ?>
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
                        <label for="username">*Email</label>
                        <input type="text" name="email" id="email" placeholder="example@city.com">
                        <div style='font-family: roboto;
    font-weight: 500;
    font-size: 13px;
    color: #ff6161;
    margin-top: 8px;'>
                            <?php if(isset($emailerror)){echo $emailerror;}?>
                        </div>
                    </div>
                    <div class="input_class">
                        <select name="role" id="">
                            <option value="client">passenger</option>
                            <option value="driver">driver</option>

                        </select>
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
                    <button class="login_btn">Register</div>
                    </form>
<a href="login.php">

    <button class="reg_btn">login</div>
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