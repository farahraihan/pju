<?php
    session_start();
    require 'function.php';

    // cek cookie
    if( isset($_COOKIE['key'])) {
        $key = $_COOKIE['key'];
        $result = request_API_Login($key);
        $obj = json_decode($result, false);
        // cek cookie (username dan password)
        if($obj != NULL){
            $_SESSION["login"] = true;
        }

    }

    if(isset($_SESSION["login"])) {
        header("Location: index.php");
        exit;
    }

    if(isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $token = encrypt($username, $password);
        $result = request_API_Login($token);

        $obj = json_decode($result, false);
        if($obj != NULL){

            // set session
            $_SESSION["login"] = true;

            // cek remember me
            if(isset($_POST['remember'])){
                // buat cookie
                // setcookie('name', 'value', time() + (60 * 60 * 24);
                setcookie('key', encrypt($username, $password), time()+(60 * 60 * 24));
            }

            header("Location: dashboard.php");
            exit;
        }

        $error = true;
       
    }
     
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="container">
        <h1>SIMP (Sistem Informasi Monitoring PJU)</h1>
    </div>

    <div class="box">
        <h2>Login</h2>
        <?php if(isset($error)) : ?>
            <p style="color : red; margin-bottom : 5px; text-align : left; font-style : italic;">Username / password salah ! </p>
        <?php endif; ?>
        <form action="" method="post">
        
            <label for="username">Username : </label>
            <input type="text" name="username" id="username">
    
            <label for="password">Password : </label>
            <input type="password" name="password" id="password">
            
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Remember me</label>
            
            <button type="submit" name="login">Login</button>

            <p> Belum punya akun?
            <a href="register.html">Klik di sini</a>
            </p>
            <p> Lupa password?
            <a href="reset.html">Klik di sini</a>
            </p>

        </form>
    </div>

    
</body>
</html>

