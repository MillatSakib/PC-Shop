<?php
// ------------------ PROCESS PAYMENT + REDIRECT ------------------
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name   = $_POST["name"];
    $card   = $_POST["card"];
    $phone  = $_POST["phone"];
    $year   = $_POST["year"];
    $cvv    = $_POST["cvv"];

    // >>> PLACE YOUR PAYMENT / DB LOGIC HERE <<<

    // Redirect after successful payment
    header("Location: end.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Payment Gateway</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #e9eef6;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .payment-card {
            background: #fff;
            padding: 30px 35px;
            border-radius: 20px;
            width: 380px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .card-logos {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .card-logos img {
            width: 55px;
            filter: drop-shadow(0 1px 2px rgba(0,0,0,0.2));
            transition: 0.3s ease;
        }

        .card-logos img:hover {
            transform: scale(1.1);
        }

        label {
            font-size: 14px;
            font-weight: 500;
            color: #555;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 2px solid #ccc;
            border-radius: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            font-size: 14px;
            transition: .3s;
        }

        input:focus {
            border-color: #6366f1;
            box-shadow: 0 0 6px rgba(99,102,241,0.4);
            outline: none;
        }

        .flex {
            display: flex;
            gap: 10px;
        }

        button {
            width: 100%;
            padding: 14px;
            background: #4f46e5;
            color: #fff;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: .3s;
        }

        button:hover {
            background: #4338ca;
        }
    </style>
</head>
<body>

<div class="payment-card">

    <h2>Payment Details</h2>

    <!-- CARD LOGOS -->
    <div class="card-logos">
        <img src="https://upload.wikimedia.org/wikipedia/commons/0/04/Visa.svg" alt="Visa">
        <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg" alt="Mastercard">
    </div>

    <!-- PAYMENT FORM -->
    <form method="POST">

        <label>Name on Card</label>
        <input type="text" name="name" required placeholder="John Doe">

        <label>Card Number</label>
        <input type="text" name="card" maxlength="19" required placeholder="0000 0000 0000 0000"
               oninput="formatCard(this)">

        <label>Phone Number</label>
        <input type="text" name="phone" required maxlength="12" placeholder="076 000 0000">

        <div class="flex">
            <div style="flex:1;">
                <label>Exp Year</label>
                <input type="text" name="year" maxlength="4" required placeholder="2026">
            </div>

            <div style="flex:1;">
                <label>CVV</label>
                <input type="password" name="cvv" maxlength="3" required placeholder="***">
            </div>
        </div>

        <button type="submit">Confirm Payment</button>
    </form>

</div>

<script>
// Auto-format card number
function formatCard(input) {
    input.value = input.value
        .replace(/\D/g, '')
        .replace(/(.{4})/g, '$1 ')
        .trim();
}
</script>

</body>
</html>
