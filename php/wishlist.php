<?php
include('../components/connection.php');
session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    header('location:../admin/login.php');
}

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `wishlist` WHERE id = '$delete_id' ") or die('query failed');
    header('location:wishlist.php');
}

if(isset($_POST['add_to_cart'])){
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = 1;

    $check_cart_numbers = mysqli_query($conn,"SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

    if(mysqli_num_rows($check_cart_numbers) > 0){
        $message[] = 'already added to cart';
    }else{
        mysqli_query($conn, "INSERT INTO `cart` (user_id, pid, name, price, quantity, image) VALUES('$user_id', '$product_id', '$product_name', '$product_price', '$product_quantity', '$product_image')")  or die('query failed');
        $message[] = 'product added to cart';
    }


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>wishlist</title>

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
    <h3>Wishlist</h3>
    <p><a href="home.php">home</a> / wishlist</p>
</div>

<section class="wishlist">
    <h2 class="text">Your products wishlist</h2>
   

    <div class="box_container">

       <?php
       $select_wishlist = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE user_id ='$user_id' ") or die ('query failed');
       if(mysqli_num_rows($select_wishlist) > 0){
        while($fetch_wishlist = mysqli_fetch_assoc($select_wishlist)){      
       ?>

       <form action="" method="POST">
        <a href="wishlist.php?delete=<?php echo $fetch_wishlist['id'];?>" class="fas fa-times" onclick="return confirm('delete this form wishlist?');"><span> remove</span></a>

        <a href="view_page.php?pid=<?php echo $fetch_wishlist['pid'];?>" class="fas fa-eye"></a>
            <button type="submit" class="fas fa-basket-shopping" name="add_to_cart"></button>
            <div class="image">
                <img src="../uploaded_img/<?php echo $fetch_wishlist['image'];?>" alt="">
            </div>
            <div class="name"><?php echo $fetch_wishlist['name'];?></div>
            <div class="flex">
                <div class="price"><?php echo $fetch_wishlist['price'];?> /-Ks</div>
                <!-- <input type="number" name="qty" class="qty" min="1" max="99" value="1" onkeypress="if(this.value.length == 2)return false;"> -->
            </div>
            <input type="hidden" name="product_id" value="<?php echo $fetch_wishlist['id'];?>">
            <input type="hidden" name="product_name" value="<?php echo $fetch_wishlist['name'];?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_wishlist['price'];?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_wishlist['image'];?>">
       </form>

       <?php
         }

        }else{
          echo ' <p class="empty">This wishlist is empty</p>';
        }
       ?>
    </div>

</section>


<?php include('footer.php');?>

<!-- js link -->
<script src="../js/script.js"></script>
    
</body>
</html>