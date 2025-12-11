<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = md5($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = md5($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   $select = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
   $select->execute([$email]);

   if($select->rowCount() > 0){
      $message[] = 'User email already exists!';
   }else{
      if($pass != $cpass){
         $message[] = 'Confirm password does not match!';
      }else{
         $insert = $conn->prepare("INSERT INTO `users`(name, email, password, image) VALUES(?,?,?,?)");
         $insert->execute([$name, $email, $pass, $image]);

         if($insert){
            if($image_size > 1000000){
               $message[] = 'Image size is too large!';
            }else{
               move_uploaded_file($image_tmp_name, $image_folder);
               header('location:login.php');
            }
         }
      }
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register - PC Shop</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

<style>

body {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
    height: 100vh;
    background: url('./images/front.jpg') no-repeat center center / cover;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
}

/* 🟩 Dark overlay for visibility */
body::before {
    content: "";
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,0.15);
}

/* 🟩 Glassmorphic Register Card */
.register-card {
    position: relative;
    width: 400px;
    padding: 40px 35px;
    border-radius: 18px;
    background: rgba(255,255,255,0.12);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.3);
    box-shadow: 0 10px 35px rgba(0,0,0,0.35);
    text-align: center;
}

.register-card h3 {
    font-size: 26px;
    font-weight: 700;
    color: #00ff66;
    text-transform: uppercase;
    margin-bottom: 20px;
}

/* Input fields */
.input-box {
    width: 100%;
    margin: 12px 0;
}

.input-box input {
    width: 100%;
    padding: 12px;
    border-radius: 10px;
    border: none;
    font-weight: 600;
    font-size: 15px;
    outline: none;
    background: rgba(255,255,255,0.85);
}

.input-box input:focus {
    box-shadow: 0 0 8px rgba(0,255,100,0.7);
}

/* Image upload box */
.input-box input[type="file"] {
    background: rgba(255,255,255,0.9);
    padding: 8px;
}

/* 🟩 Button */
.btn {
    width: 100%;
    background: #00cc44;
    color: #fff;
    border: none;
    padding: 12px;
    font-size: 17px;
    font-weight: 700;
    margin-top: 15px;
    border-radius: 10px;
    cursor: pointer;
}

.btn:hover {
    background: #009933;
    transform: translateY(-2px);
}

/* Link section */
.register-card p {
    color: white;
    margin-top: 16px;
    font-size: 14px;
}

.register-card p a {
    color: #00752fff;
    font-weight: 600;
    text-decoration: none;
}

.register-card p a:hover {
    text-decoration: underline;
}

/* Error message */
.message {
    background: #fff;
    padding: 10px 15px;
    margin: 10px;
    border-left: 4px solid red;
    border-radius: 6px;
    font-weight: 600;
}

.message i {
    cursor: pointer;
    float: right;
    color: red;
}

</style>
</head>

<body>

<?php
if(isset($message)){
   foreach($message as $msg){
      echo '
      <div class="message">
         <span>'.$msg.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>';
   }
}
?>

<div class="register-card">

    <h3>Register</h3>

    <form action="" method="POST" enctype="multipart/form-data">

        <div class="input-box">
            <input type="text" name="name" placeholder="Enter your name" required>
        </div>

        <div class="input-box">
            <input type="email" name="email" placeholder="Enter your email" required>
        </div>

        <div class="input-box">
            <input type="password" name="pass" placeholder="Enter your password" required>
        </div>

        <div class="input-box">
            <input type="password" name="cpass" placeholder="Confirm your password" required>
        </div>

        <div class="input-box">
            <input type="file" name="image" accept="image/jpg,image/jpeg,image/png" required>
        </div>

        <input type="submit" value="Register Now" name="submit" class="btn">

        <p>Already have an account? <a href="login.php">Login</a></p>

    </form>
</div>

</body>
</html>
