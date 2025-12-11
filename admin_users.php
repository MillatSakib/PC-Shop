<?php

@include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
   header('location:login.php');
}

/* ---------------------- MAKE ADMIN LOGIC ---------------------- */
if (isset($_GET['make_admin'])) {

   $user_id = $_GET['make_admin'];

   // Update user_type to admin
   $make_admin_query = $conn->prepare("UPDATE `users` SET user_type = 'admin' WHERE id = ?");
   $make_admin_query->execute([$user_id]);

   header('location:admin_users.php');
}

/* ---------------------- DELETE USER LOGIC ---------------------- */
if (isset($_GET['delete'])) {

   $delete_id = $_GET['delete'];

   $delete_users = $conn->prepare("DELETE FROM `users` WHERE id = ?");
   $delete_users->execute([$delete_id]);

   header('location:admin_users.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Users List</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- external css file -->
   <link rel="stylesheet" href="css/cssstyle.css">

</head>

<body>

   <?php include 'admin_header.php'; ?>

   <section class="user-accounts">

      <h1 class="title">User Accounts</h1>

      <div class="box-container">

         <?php
         $select_users = $conn->prepare("SELECT * FROM `users`");
         $select_users->execute();

         while ($fetch_users = $select_users->fetch(PDO::FETCH_ASSOC)) {
         ?>

            <div class="box" <?php if ($fetch_users['id'] == $admin_id) echo 'style="display:none"'; ?>>

               <img src="uploaded_img/<?= $fetch_users['image']; ?>" alt="">

               <p> User ID : <span><?= $fetch_users['id']; ?></span></p>
               <p> User Name : <span><?= $fetch_users['name']; ?></span></p>
               <p> Email : <span><?= $fetch_users['email']; ?></span></p>

               <p> User Type :
                  <span><?= $fetch_users['user_type']; ?></span>
               </p>

               <!-- MAKE ADMIN BUTTON (visible only for normal users) -->
               <?php if ($fetch_users['user_type'] == 'user') { ?>
                  <a href="admin_users.php?make_admin=<?= $fetch_users['id']; ?>" class="admin-btn">
                     Make Admin
                  </a>
               <?php } else { ?>
                  <a class="admin-btn disabled">Already Admin</a>
               <?php } ?>

               <!-- DELETE BUTTON -->
               <a href="admin_users.php?delete=<?= $fetch_users['id']; ?>"
                  onclick="return confirm('Delete this user?');"
                  class="delete-btn">
                  Delete
               </a>

            </div>

         <?php } ?>

      </div>

   </section>

<script src="js/script.js"></script>

</body>
</html>
