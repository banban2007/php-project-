<?php
include('../components/connection.php');
session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:login.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin dashboard</title>

    <!-- remix icon cdn link  -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.0.0/fonts/remixicon.css" rel="stylesheet">

    <!-- custom css -->
    <link rel="stylesheet" type="text/css" href="css/admin_style.css">

    <!-- farvicon -->
    <link rel="icon" href="../img/farvicon1.png">

    <!-- cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" 
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

<?php include('admin_header.php'); ?>


<div class="page">
    <div class="page-header">
      <h1>Dashboard</h1>
    </div>
</div>



<section class="dashboard">



    <div class="box">
        <?php
        $total_pendings = 0;
        $select_pendings = mysqli_query($conn, "SELECT * FROM `order` WHERE payment_status = 'pending'") or die('query failed');
        while($fetch_pendings = mysqli_fetch_assoc($select_pendings)){
            $total_pendings += $fetch_pendings['total_price'];
        };
        ?>
        <h3><?php echo $total_pendings;?> Ks</h3>
        <p>total pendings</p>
    </div>

    <div class="box">
        <?php
        $total_completes = 0;
        $select_completes = mysqli_query($conn, "SELECT * FROM `order` WHERE payment_status = 'completed'") or die('query failed');
        while($fetch_completes = mysqli_fetch_assoc($select_completes)){
            $total_completes += $fetch_completes['total_price'];
        };
        ?>
        <h3><?php echo $total_completes;?> Ks</h3>
        <p>completes payment</p>
    </div>

    <div class="box">
        <?php
        $select_orders = mysqli_query($conn, "SELECT * FROM `order`") or die('query failed');
        $number_of_orders = mysqli_num_rows($select_orders);
        ?>
        <h3><?php echo $number_of_orders ;?></h3>
        <p>order placed </p>
    </div>

    <div class="box">
        <?php
        $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
        $number_of_products = mysqli_num_rows($select_products);
        ?>
        <h3><?php echo $number_of_products ;?></h3>
        <p>products add</p>
    </div>


    <div class="box">
        <?php
        $select_users = mysqli_query($conn, "SELECT * FROM `user` WHERE user_type = 'user'") or die('query failed');
        $number_of_users = mysqli_num_rows($select_users);
        ?>
        <h3><?php echo $number_of_users ;?></h3>
        <p>normal users</p>
    </div>

    <div class="box">
        <?php
        $select_admin = mysqli_query($conn, "SELECT * FROM `user` WHERE user_type = 'admin'") or die('query failed');
        $number_of_admin = mysqli_num_rows($select_admin);
        ?>
        <h3><?php echo $number_of_admin ;?></h3>
        <p>admin</p>
    </div>

    
    <div class="box">
        <?php
        $select_account = mysqli_query($conn, "SELECT * FROM `user`") or die('query failed');
        $number_of_account = mysqli_num_rows($select_account);
        ?>
        <h3><?php echo $number_of_account ;?></h3>
        <p>total account</p>
    </div>

    <div class="box">
        <?php
        $select_message = mysqli_query($conn, "SELECT * FROM `message`") or die('query failed');
        $number_of_message = mysqli_num_rows($select_message);
        ?>
        <h3><?php echo $number_of_message ;?></h3>
        <p>total message</p>
    </div>

    
</section>

<?php include('js.php');?>
</body>
</html>