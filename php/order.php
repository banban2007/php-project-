<?php
include('../components/connection.php');
session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    header('location:../admin/login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>

    <!-- remix icon cdn link  -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.0.0/fonts/remixicon.css" rel="stylesheet">

    <!-- custom css -->
     <link rel="stylesheet" type="text/css" href="../css/style.css">

    <!-- farvicon -->
     <link rel="icon" href="../img/farvicon1.png">

     <!-- cdn link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" 
     integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" 
     crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

<?php include('header.php');?>

<div class="banner">
    <h3>Your Order</h3>
    <p><a href="home.php">home</a> / order</p>
</div>


<!-- order -->

<section class="order"> 

    <h1 class="title">Placed orders</h1>
    

    <div class="box_container">
        <?php
        $select_orders = mysqli_query($conn, "SELECT * FROM `order` WHERE user_id ='$user_id' ") or die('query failed');
        if(mysqli_num_rows($select_orders) > 0){
            while($fetch_orders = mysqli_fetch_assoc($select_orders)){

        
        ?>
        <div class="box">
            <p>Placed On : <span><?php echo $fetch_orders['placed_on'];?></span></p>
            <p>Name : <span><?php echo $fetch_orders['name'];?></span></p>
            <p>Number : <span><?php echo $fetch_orders['number'];?></span></p>
            <p>Email : <span><?php echo $fetch_orders['email'];?></span></p>
            <p>Method : <span><?php echo $fetch_orders['method'];?></span></p>
            <p>address : <span><?php echo $fetch_orders['address'];?></span></p>
            <p>Your Orders : <span><?php echo $fetch_orders['total_products'];?></span></p>
            <p>Total Price : <span><?php echo $fetch_orders['total_price'];?> Ks</span></p>
            <p>Payment Status : <span style="color:<?php if($fetch_orders['payment_status'] == 'pending'){echo 'var(--red)';}else{ echo 'green';}?>;"><?php echo $fetch_orders['payment_status'];?></span></p>




        </div>
        <?php
            }

        }else{
            echo'<p class="empty">no orders placed yet!</p>';
        }
        ?>
    </div>

</section>
<!-- order end -->

<?php include('footer.php');?>
<!-- js link -->
<script src="../js/script.js"></script>
    
</body>
</html>