<?php

@include 'config.php';
session_start();

if (isset($_POST['submit'])) {

    if (empty($_POST['email']) || empty($_POST['pass'])) {

        $message[] = 'All fields are Required';

    } else {

        $email = $_POST['email'];
        $email = filter_var($email, FILTER_SANITIZE_STRING);
        $pass = md5($_POST['pass']);
        $pass = filter_var($pass, FILTER_SANITIZE_STRING);

        $sql = "SELECT * FROM `users` WHERE email = ? AND password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email, $pass]);
        $rowCount = $stmt->rowCount();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($rowCount > 0) {
            if ($row['user_type'] == 'admin') {
                $_SESSION['admin_id'] = $row['id'];
                header('location:admin_page.php');
            } elseif ($row['user_type'] == 'user') {
                $_SESSION['user_id'] = $row['id'];
                header('location:/');
            } else {
                $message[] = 'no user found!';
            }
        } else {
            $message[] = 'incorrect email or password!';
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
<title>PC Shop - Login</title>

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

/* Dark overlay */
body::before {
    content: "";
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.15);
}

/* ==== GLASS LOGIN CARD ==== */
.login-card {
    position: relative;
    width: 380px;
    padding: 40px 35px;
    border-radius: 18px;
    background: rgba(255, 255, 255, 0.12);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.3);
    box-shadow: 0 10px 35px rgba(0,0,0,0.3);
    text-align: center;
}

.login-card h3 {
    margin-bottom: 18px;
    font-size: 26px;
    font-weight: 700;
    color: #00ff66;
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* ==== INPUT FIELDS ==== */
.input-box {
    width: 100%;
    margin: 12px 0;
    position: relative;
}

.input-box input {
    width: 100%;
    padding: 12px 14px;
    border-radius: 10px;
    border: none;
    outline: none;
    font-size: 15px;
    font-weight: 600;
    background: rgba(255,255,255,0.85);
    color: #000;
}

.input-box input:focus {
    box-shadow: 0 0 8px rgba(0,255,100,0.7);
}

/* ==== BUTTON ==== */
.btn {
    width: 100%;
    background: #00cc44;
    color: white;
    border: none;
    padding: 12px;
    border-radius: 10px;
    font-size: 17px;
    font-weight: 700;
    margin-top: 15px;
    cursor: pointer;
    transition: 0.2s ease-in-out;
}

.btn:hover {
    background: #009933;
    transform: translateY(-2px);
}

/* Register Link */
.login-card p {
    margin-top: 18px;
    font-size: 14px;
    color: white;
}

.login-card p a {
    color: #005823ff;
    font-weight: 600;
    text-decoration: none;
}

.login-card p a:hover {
    text-decoration: underline;
}

/* Error Message */
.message {
    position: absolute;
    top: 20px;
    background: white;
    padding: 10px 14px;
    border-left: 4px solid red;
    border-radius: 5px;
    font-weight: 600;
}

.message i {
    cursor: pointer;
    float: right;
    margin-left: 10px;
    color: red;
}

</style>
</head>

<body>

<?php
if (isset($message)) {
    foreach ($message as $msg) {
        echo '
        <div class="message">
            <span>' . $msg . '</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>';
    }
}
?>

<div class="login-card">

    <h3>Login</h3>

    <form method="POST">

        <div class="input-box">
            <input type="email" name="email" placeholder="Enter your email" required>
        </div>

        <div class="input-box">
            <input type="password" name="pass" placeholder="Enter your password" required>
        </div>

        <input type="submit" value="Login Now" name="submit" class="btn">

        <p>Don't have an account? <a href="register.php">Register</a></p>
    </form>

</div>

</body>
</html>
