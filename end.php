<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>

<style>
    body{
        background-image: url('images/img7.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        font-family: "Poppins", sans-serif;
    }

    .success-box {
        background: rgba(255, 255, 255, 0.85);
        width: 450px;
        padding: 40px 35px;
        border-radius: 18px;
        text-align: center;
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        backdrop-filter: blur(5px);
        animation: fadeIn 0.6s ease-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    /* SUCCESS TICK ANIMATION */
    .checkmark {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        display: inline-block;
        border: 5px solid #28a745;
        position: relative;
        margin-bottom: 20px;
        animation: pop 0.4s ease;
    }

    @keyframes pop {
        0% { transform: scale(0.4); opacity: 0; }
        100% { transform: scale(1); opacity: 1; }
    }

    .checkmark::after {
        content: "";
        position: absolute;
        left: 22px;
        top: 10px;
        width: 22px;
        height: 45px;
        border: solid #28a745;
        border-width: 0 8px 8px 0;
        transform: rotate(45deg);
    }

    h1 {
        font-size: 32px;
        font-weight: 700;
        color: #1c641f;
        margin-bottom: 10px;
        text-shadow: 0 0 4px #a4d6a7;
    }

    p {
        font-size: 18px;
        font-weight: 500;
        color: #333;
        margin-bottom: 25px;
    }

    .home-btn {
        display: inline-block;
        padding: 12px 28px;
        background: #1c641f;
        color: white;
        font-size: 18px;
        font-weight: 600;
        border-radius: 8px;
        text-decoration: none;
        transition: 0.3s;
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }

    .home-btn:hover {
        background: #145017;
        transform: translateY(-2px);
    }
</style>

</head>
<body>

    <div class="success-box">
        <span class="checkmark"></span>

        <h1>Payment Successful!</h1>
        <p>Thank you for your shopping with us.</p>

        <a href="/" class="home-btn">Go Home</a>
    </div>

</body>
</html>
