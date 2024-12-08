<?php
include('../components/connection.php');
session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    header('location:../admin/login.php');
}

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$delete_id' ") or die('query failed');
    header('location:shooping_cart.php');
}

if(isset($_GET['delete_all'])){
    mysqli_query($conn,  "DELETE FROM `cart` WHERE user_id = '$user_id' ") or die('query failed');
    header('location:shooping_cart.php');
}

if(isset($_POST['update_quantity'])){
    $cart_id = $_POST['cart_id'];
    $cart_quantity = $_POST['cart_quantity'];
    mysqli_query($conn,  "UPDATE  `cart` SET quantity = '$cart_quantity' WHERE id = '$cart_id' ") or die('query failed');
    $message[] = 'cart update';

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shooping cart</title>

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
    <h3>shooping cart</h3>
    <p><a href="home.php">home</a> / shooping cart</p>
</div>

<section class="shooping_cart">

    <div class="box_container">

        <div class="row">
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>quantity</th>
                        <th>total price</th>            
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $grand_total = 0;
                    $select_carts = mysqli_query($conn, "SELECT * FROM `cart` ")  or die('query failed');
                    if(mysqli_num_rows($select_carts) > 0){
                        while($fetch_carts = mysqli_fetch_assoc($select_carts)){

                    
                    ?>
                    <tr>
                        <td><a href="shooping_cart.php?delete=<?php echo $fetch_carts['id'];?>" class="fas fa-times" onclick="return confirm('delete this cart?');"></a></td>
                        <td><img src="../uploaded_img/<?php echo $fetch_carts['image'];?>" height="100" alt=""></td>
                        <td><div><?php echo $fetch_carts['name'];?></div></td>
                        <td><div><?php echo $fetch_carts['price'];?> Ks</div></td>
                        <td>
                            <form action="" method="POST">
                                <input type="hidden" value="<?php echo $fetch_carts['id']; ?>" name="cart_id">
                                <input type="number" min="1" value="<?php echo $fetch_carts['quantity']; ?>" name="cart_quantity" class="qty">
                                <input type="submit" value="update" class="option_btn" name="update_quantity">
                            </form>
                        </td>
                        <td><div><?php echo $sub_total = ($fetch_carts['price'] * $fetch_carts['quantity']);?> Ks</div></td>
                    </tr>
                    <?php
                    $grand_total += $sub_total;
                        }
                    }else{
                        echo '<p class="empty">Your cart is currently empty.</p>';
                    }
                    ?>
                </tbody>
                
            </table>

            <div class="sub_total">
                <h2>Card Total</h2>
                <p>sub total : <span><?php echo $grand_total; ?> Ks</span></p>
                <a href="checkout.php" class="btn  <?php echo ($grand_total > 1)?'':'disabled' ?>">proceed to checkout</a>
                <a href="shooping_cart.php?delete_all" class="delete_btn <?php echo ($grand_total > 1)?'':'disabled' ?>" onclick="return confirm('delete all from cart?');">delete all</a>
            </div>

        </div>

    </div>

</section>









<?php include('footer.php');?>

<!-- js link -->
<script src="../js/script.js"></script>
    
</body>
</html>