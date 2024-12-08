<?php
include('../components/connection.php');
session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    header('location:../admin/login.php');
}

if(isset($_POST['order'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $method = mysqli_real_escape_string($conn, $_POST['method']);
    $address = mysqli_real_escape_string($conn, $_POST['address']. ', Region -'. $_POST['region'] .' , Township -'.$_POST['township']);
    $place_on = date('y-m-d');

    $cart_total = 0;
    $cart_products = [];

    $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    if(mysqli_num_rows($cart_query) > 0){
        while($cart_item = mysqli_fetch_assoc($cart_query)){
            $cart_products[] = $cart_item['name'].' ( '.$cart_item['quantity'].' ) ';
            $sub_total = ($cart_item['price'] * $cart_item['quantity']);
            $cart_total += $sub_total;
        }
    }

    $total_products = implode(' , ' , $cart_products);
    $order_query = mysqli_query($conn, "SELECT * FROM `order` WHERE name = '$name' 
    AND number = '$number' AND email = '$email' AND method = '$method'
    AND address = '$address' AND total_products = '$total_products' 
    AND total_price = '$cart_total' ") or die('query failed');

    if($cart_total == 0){
    }elseif(mysqli_num_rows($order_query) > 0){
    }else{
        mysqli_query($conn, "INSERT INTO `order`(user_id, name, number, email, method, address, total_products, total_price, placed_on) 
        VALUES('$user_id', '$name', '$number', '$email', '$method', '$address', '$total_products', '$cart_total', '$place_on')") or die('query failed');
        mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id' ") or die('query failed');
        $message[] = 'order placed successfully!';
        header('location:shooping_cart.php');
    }
       
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkout Order</title>

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
    <h3>CheckOut Order</h3>
    <p><a href="home.php">home</a> / checkout</p>
</div>


<!-- order -->

<section class="checkout">
    <div class="container">
        <div class="form_section">
            <form action="" method="POST">
                <h2>BILLING & SHIPPING</h2>

                <div class="place_order">
                    <div class="inputBox">
                        <span>Your Name</span>
                        <input type="text" name="name" placeholder="enter your name">
                    </div>
                    <div class="inputBox">
                        <span>Phone *</span>
                        <input type="number" name="number" placeholder="enter your phone number">
                    </div>
                    <div class="inputBox">
                        <span>Email</span>
                        <input type="email" name="email" placeholder="enter your email">
                    </div>
                    <div class="inputBox">
                        <span>Payment method</span>
                        <select name="method" id="">
                            <option value="KBZPay">KBZPay</option>
                            <option value="WavePay">WavePay</option>
                            <option value="AYA Pay">AYA Pay</option>
                            <option value="cash on delivery">Cash on delivery</option>
                        </select>
                    </div>
                    <div class="inputBox">
                        <span>Region</span>
                        <input type="text" name="region" placeholder="Yangon ..">
                    </div>
                    <div class="inputBox">
                        <span>Township</span>
                        <input type="text" name="township" placeholder="enter your township">
                    </div>
                    <div class="inputBox">
                        <span>Street Address</span>
                        <input type="text" name="address" placeholder="ပစ္စည်းပေးပိုရမည့် လိပ်စာ အပြည့်အစုံဖြည့်ပေးပါရန်">
                    </div>
                </div>
                <input type="submit" name="order" value="order now" class="btn">
            </form>

        </div>
    </div>
   
<div class="order_section">
    <h2>Your Order</h2>
        <div class="row">
            <table>
                <thead>

                    <tr>
                        <th>PRODUCT</th>
                        <th>SUBTOTAL</th>
                    </tr>
                    
                </thead>
                <tbody>
                    <?php
                        $grand_total = 0;
                        $select_carts = mysqli_query($conn, "SELECT * FROM `cart` ")  or die('query failed');
                        if(mysqli_num_rows($select_carts) > 0){
                            while($fetch_carts = mysqli_fetch_assoc($select_carts)){
                            $total_price = ($fetch_carts['price'] * $fetch_carts['quantity']);
                            $grand_total += $total_price;
                        ?>
                        <tr>
                            <td><span><?php echo $fetch_carts['name'].' x '.$fetch_carts['quantity'];?></span></td>
                            <td><span><?php echo $fetch_carts['price'];?> Ks</span></td>
                        </tr>
                        
        
        

                    
                        <?php
                            }
                        }else{
                            echo '<p class="empty">Your cart is currently empty.</p>';
                        }
                        ?>
                </tbody>
                
               
            </table>
            <div class="total"><p>Total : <span><?php echo $grand_total;?> Ks</span></p></div>
        </div>
        
        
    </div>


</section>


<!-- order end -->

<?php include('footer.php');?>
<!-- js link -->
<script src="../js/script.js"></script>
    
</body>
</html>