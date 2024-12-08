<?php
include('../components/connection.php');
session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:login.php');
}

if(isset($_POST['update_product'])){
    $update_p_id = $_POST['update_p_id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $details = mysqli_real_escape_string($conn, $_POST['details']);

    mysqli_query($conn, "UPDATE `products` SET name='$name', details = '$details', price ='$price', category = '$category' WHERE id = $update_p_id") or die('query failed');

    $image_1 = $_FILES['image_1']['name'];
    $image_size_1 = $_FILES['image_1']['size'];
    $image_tmp_name_1 = $_FILES['image_1']['tmp_name'];
    $image_folder_1 = '../uploaded_img/'.$image_1;
    $old_image_1 = $_POST['update_p_image_1'];

    if(!empty($image_1)){
        if($image_size_1 > 2000000){
            $message[] = 'image 1 file size is too large!';
        }else{
            mysqli_query($conn, "UPDATE `products` SET image_1 = '$image_1' WHERE id = '$update_p_id' ") or die('query failed');
            move_uploaded_file($image_tmp_name_1, $image_folder_1);
            unlink('../uploaded_img/'.$old_image_1);
            $message[] = 'image 1 updated successfully!';
        }
    }

    $image_2 = $_FILES['image_2']['name'];
    $image_size_2 = $_FILES['image_2']['size'];
    $image_tmp_name_2 = $_FILES['image_2']['tmp_name'];
    $image_folder_2 = '../uploaded_img/'.$image_2;
    $old_image_2 = $_POST['update_p_image_2'];

    if(!empty($image_2)){
        if($image_size_2 > 2000000){
            $message[] = 'image 2 file size is too large!';
        }else{
            mysqli_query($conn, "UPDATE `products` SET image_2 = '$image_2' WHERE id = '$update_p_id' ") or die('query failed');
            move_uploaded_file($image_tmp_name_2, $image_folder_2);
            unlink('../uploaded_img/'.$old_image_2);
            $message[] = 'image 2 updated successfully!';
        }
    }

    $image_3 = $_FILES['image_3']['name'];
    $image_size_3 = $_FILES['image_3']['size'];
    $image_tmp_name_3 = $_FILES['image_3']['tmp_name'];
    $image_folder_3 = '../uploaded_img/'.$image_3;
    $old_image_3 = $_POST['update_p_image_3'];

    if(!empty($image_3)){
        if($image_size_3 > 2000000){
            $message[] = 'image 3 file size is too large!';
        }else{
            mysqli_query($conn, "UPDATE `products` SET image_3 = '$image_3' WHERE id = '$update_p_id' ") or die('query failed');
            move_uploaded_file($image_tmp_name_3, $image_folder_3);
            unlink('../uploaded_img/'.$old_image_3);
            $message[] = 'image 3 updated successfully!';
        }
    }

    $message[] = 'product updated successfully!';
    
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update product</title>

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
      <h1>Update Products</h1>
    </div>
</div>

<!-- admin update product start -->

<section class="update_product">
    

<?php

    $update_id = $_GET['update'];
    $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$update_id'") or die('query failed');
    if(mysqli_num_rows($select_products) > 0){
        while($fetch_products = mysqli_fetch_assoc($select_products)){

   

?>

<form action="" method="POST" enctype="multipart/form-data">

    <h3>update product</h3>
    <div class="image_container">

        <div class="main_image">
            <img src="../uploaded_img/<?php echo $fetch_products['image_1'];?>" alt="">
        </div>
        <div class="sub_images">
            <img src="../uploaded_img/<?php echo $fetch_products['image_1'];?>" alt="">
            <img src="../uploaded_img/<?php echo $fetch_products['image_2'];?>" alt="">
            <img src="../uploaded_img/<?php echo $fetch_products['image_3'];?>" alt="">
        </div>
        
    </div>
    <div class="inputBox">
        <input type="hidden" value="<?php echo $fetch_products['id'];?>" name="update_p_id">
    </div>

    <div class="inputBox">
        <input type="hidden" value="<?php echo $fetch_products['image_1'];?>" name="update_p_image_1">
    </div>

    <div class="inputBox">
        <input type="hidden" value="<?php echo $fetch_products['image_2'];?>" name="update_p_image_2">
    </div>

    <div class="inputBox">
        <input type="hidden" value="<?php echo $fetch_products['image_3'];?>" name="update_p_image_3">
    </div>

    <div class="inputBox">
        <input type="hidden" value="<?php echo $fetch_products['category'];?>" name="update_p_category">
    </div>


    
    <div class="inputBox">
        <span>update name</span>
        <input type="text" class="box" value="<?php echo $fetch_products['name'];?>" placeholder="update product name" name="name" require>
    </div>

    <div class="inputBox">
        <span>update price</span>
        <input type="number" min="0" class="box" value="<?php echo $fetch_products['price'];?>" placeholder="update product price" name="price" require>
    </div>

    <div class="inputBox">
        <span>update category</span>
        <select name="category" class="box" value="<?php echo $fetch_products['category'];?>" required>
            <option value="" disabled selected>select category --</option>
            <option value="android_phone">android</option>
            <option value="ios_phone">ios</option>
            <option value="tablets">tablets</option>
            <option value="smart products">smart products</option>
            <option value="computer">computer</option>
        </select>
    </div>

    <div class="inputBox">
        <span>update image 1</span>
        <input type="file" name="image_1" accept="image/jpg, image/jpeg, image/png, image/webp, image/avif" class="box">
    </div>
    <div class="inputBox">
        <span>update image 2</span>
        <input type="file" name="image_2" accept="image/jpg, image/jpeg, image/png, image/webp, image/avif" class="box">
    </div>
    <div class="inputBox">
        <span>update image 3</span>
        <input type="file" name="image_3" accept="image/jpg, image/jpeg, image/png, image/webp, image/avif" class="box">
    </div>
    <textarea name="details" class="box" placeholder="update product details" cols="40" row="20" ><?php echo $fetch_products['details'];?></textarea>
    <input type="submit" name="update_product" class="btn" value="update product">
    <a href="admin_order_list.php" class="option_btn">go back</a>

</form>

<?php
      }
    }else{
        echo '<p class="empty">no update product select</p>';
    }
?>
    
</section>


<!-- admin update product end -->

<?php include('js.php');?>
</body>
</html>