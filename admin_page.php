<?php

@include 'config.php';
session_start();

$admin_id = $_SESSION['admin_id'];
if (!isset($admin_id)) {
    header('location:login.php');
}

/* ---------------- FETCH IMPORTANT METRICS ---------------- */

// Pending Orders & Amount
$pending_orders = $conn->prepare("SELECT total_price FROM orders WHERE payment_status = 'pending'");
$pending_orders->execute();
$pending_amount = 0;
$pending_count = $pending_orders->rowCount();
while ($row = $pending_orders->fetch(PDO::FETCH_ASSOC)) {
    $pending_amount += $row['total_price'];
}

// Completed Orders & Amount
$completed_orders = $conn->prepare("SELECT total_price FROM orders WHERE payment_status = 'completed'");
$completed_orders->execute();
$completed_amount = 0;
$completed_count = $completed_orders->rowCount();
while ($row = $completed_orders->fetch(PDO::FETCH_ASSOC)) {
    $completed_amount += $row['total_price'];
}

// Total Orders & Revenue
$orders = $conn->prepare("SELECT total_price FROM orders");
$orders->execute();
$total_orders = $orders->rowCount();
$total_revenue = 0;
while ($row = $orders->fetch(PDO::FETCH_ASSOC)) {
    $total_revenue += $row['total_price'];
}

// Products, Users, Admins, Messages
$total_products = $conn->query("SELECT * FROM products")->rowCount();
$total_users = $conn->query("SELECT * FROM users WHERE user_type='user'")->rowCount();
$total_admins = $conn->query("SELECT * FROM users WHERE user_type='admin'")->rowCount();
$total_messages = $conn->query("SELECT * FROM message")->rowCount();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytics Dashboard</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- External CSS -->
    <link rel="stylesheet" href="./css/cssstyle.css">

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        /* DASHBOARD UI */
        .dashboard {
            padding: 20px;
        }

        .dashboard .title {
            text-align: center;
            font-size: 30px;
            font-weight: 700;
            color: #1c641f;
            margin-bottom: 30px;
        }

        /* === STAT CARDS === */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: white;
            padding: 22px;
            border-radius: 16px;
            text-align: center;
            border-left: 6px solid #1c641f;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.12);
            transition: 0.25s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.18);
        }

        .stat-card h3 {
            font-size: 26px;
            color: #1c641f;
            margin-bottom: 5px;
        }

        .stat-card p {
            color: #444;
            font-size: 15px;
            margin-bottom: 4px;
            font-weight: 500;
        }

        /* === CHART GRID === */
        .charts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(360px, 1fr));
            gap: 25px;
            padding: 10px 0;
        }

        .chart-box {
            background: #ffffff;
            padding: 25px;
            border-radius: 16px;
            box-shadow: 0 8px 22px rgba(0, 0, 0, 0.12);
            border-left: 6px solid #1c641f;
            transition: 0.25s ease;
        }

        .chart-box:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 26px rgba(0, 0, 0, 0.18);
        }

        .chart-box h3 {
            margin-bottom: 12px;
            font-size: 20px;
            font-weight: 700;
            color: #1c641f;
            text-align: center;
        }
    </style>
</head>

<body>

<?php include 'admin_header.php'; ?>

<section class="dashboard">

    <h1 class="title">Analytics Dashboard</h1>

    <!-- ================= STATS GRID ================= -->
    <div class="stats-grid">

        <div class="stat-card">
            <h3><?= $pending_count ?></h3>
            <p><b>Pending Orders</b></p>
            <p>Amount: Tk.<?= $pending_amount ?></p>
        </div>

        <div class="stat-card">
            <h3><?= $completed_count ?></h3>
            <p><b>Completed Orders</b></p>
            <p>Amount: Tk.<?= $completed_amount ?></p>
        </div>

        <div class="stat-card">
            <h3><?= $total_orders ?></h3>
            <p><b>Total Orders</b></p>
            <p>Revenue: Tk.<?= $total_revenue ?></p>
        </div>

        <div class="stat-card">
            <h3><?= $total_products ?></h3>
            <p><b>Total Products</b></p>
        </div>

        <div class="stat-card">
            <h3><?= $total_users ?></h3>
            <p><b>Total Users</b></p>
        </div>

        <div class="stat-card">
            <h3><?= $total_admins ?></h3>
            <p><b>Total Admins</b></p>
        </div>

        <div class="stat-card">
            <h3><?= $total_messages ?></h3>
            <p><b>Total Messages</b></p>
        </div>

    </div>

    <!-- ================= CHART GRID ================= -->
    <section class="charts-grid">

        <div class="chart-box">
            <h3>Pending vs Completed Revenue</h3>
            <canvas id="revenueChart"></canvas>
        </div>

        <div class="chart-box">
            <h3>Order Status Overview</h3>
            <canvas id="ordersChart"></canvas>
        </div>

        <div class="chart-box">
            <h3>User Distribution</h3>
            <canvas id="usersChart"></canvas>
        </div>

    </section>

</section>

<script>
// REVENUE BAR CHART
new Chart(document.getElementById("revenueChart"), {
    type: "bar",
    data: {
        labels: ["Pending", "Completed"],
        datasets: [{
            label: "Revenue (Tk)",
            data: [<?= $pending_amount ?>, <?= $completed_amount ?>],
            backgroundColor: ["#ff9800", "#4CAF50"]
        }]
    }
});

// ORDERS PIE CHART
new Chart(document.getElementById("ordersChart"), {
    type: "pie",
    data: {
        labels: ["Pending Orders", "Completed Orders"],
        datasets: [{
            data: [<?= $pending_count ?>, <?= $completed_count ?>],
            backgroundColor: ["#ff5722", "#8bc34a"]
        }]
    }
});

// USERS DOUGHNUT CHART
new Chart(document.getElementById("usersChart"), {
    type: "doughnut",
    data: {
        labels: ["Users", "Admins"],
        datasets: [{
            data: [<?= $total_users ?>, <?= $total_admins ?>],
            backgroundColor: ["#2196F3", "#9C27B0"]
        }]
    }
});
</script>

</body>
</html>
