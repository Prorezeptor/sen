<?php
require 'fungsi.php';


//cek apakah tombol submit sudah ditekan atau belum
if( isset ($_POST["login"] ) ){
    
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($db, "SELECT * FROM lgn WHERE username = '$username'")or die(mysqli_error());
    //cek username
    if ( mysqli_num_rows($result) === 1 ) {

        //cek password
        $row = mysqli_fetch_assoc($result);
        if ( password_verify ($password, $row["password"]) ) {
            header("location: sentramain/index.php");
            exit;
        }
    }
    $error = true;
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />
    <style>
      body {
        margin: 0;
        padding: 0;
        font-family: "Roboto", sans-serif;
        height: 100vh;
        overflow: hidden;
        background-image: url(bg-01.jpg);
        background-size: cover;
      }

      .center {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 400px;
        background: white;
        border-radius: 10px;
      }

      .center h1 {
        text-align: center;
        padding: 0 0 20px 0;
        border-bottom: 1px solid silver;
      }

      .center form {
        padding: 0 40px;
        box-sizing: border-box;
      }

      form .txt_field {
        position: relative;
        border-bottom: 2px solid #adadad;
        margin: 30px 0;
      }

      .txt_field input {
        width: 100%;
        padding: 0 5px;
        height: 40px;
        font-size: 16px;
        border: none;
        background: none;
        outline: none;
      }

      .txt_field label {
        position: absolute;
        top: 50%;
        left: 5px;
        color: #adadad;
        transform: translateY(-50%);
        font-size: 16px;
        pointer-events: none;
        transition: .5s;
      }

      .txt_field span::before {
        content: "";
        position: absolute;
        top: 40px;
        left: 0;
        width: 0%;
        height: 2px;
        background: #2691d9;
        transition: .5s;
      }
      .txt_field input:focus ~ label, 
      .txt_field input:valid ~ label {
          top: -5px;
          color: #2691d9;
      }
      .txt_field input:focus ~ span::before, 
      .txt_field input:valid ~ span::before{
        width: 100%;
      }

      input[type="submit"]{
          width: 100%;
          height: 50px;
          border: 1px solid;
          background: #2691d9;
          border-radius: 25px;
          font-size: 18px;
          color: #e9f4fb;
          font-weight: 700;
          cursor: pointer;
          outline: none;
          margin: 30px 0;

      }

      input[type="submit"]:hover{
          border-color: #2691d9;
          transition: .5s;
      }
    </style>
  </head>
  <body>
    <div class="center">
      <h1>Login</h1>
      <?php if ( isset ($error) ) : ?>
            <p style="color: red">           username atau password salah!</p>
      <?php endif; ?>
      <form action="" method="post">
        <div class="txt_field">
            <input type="text" name="username" id="username" required />
            <span></span>
            <label for = "username">Username</label>
        </div>
        <div class="txt_field">
            <input type="password" name="password" id="password" required />
            <span></span>
            <label for = "password">Password</label>
        </div>
        <input type="submit" value="login" name="login" />
          <a href="register.php">
            Register
          </a>
          <span></span>
      </form>
    </div>
  </body>
</html>