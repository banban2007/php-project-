<?php
include('../components/connection.php');
session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:login.php');
}

if(isset($_POST['add_product'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $image_1 = $_FILES['image_1']['name'];
    $image_size_1 = $_FILES['image_1']['size'];
    $image_tmp_name_1 = $_FILES['image_1']['tmp_name'];
    $image_folder_1 = '../uploaded_img/'.$image_1;

    $image_2 = $_FILES['image_2']['name'];
    $image_size_2 = $_FILES['image_2']['size'];
    $image_tmp_name_2 = $_FILES['image_2']['tmp_name'];
    $image_folder_2 = '../uploaded_img/'.$image_2;

    $image_3 = $_FILES['image_3']['name'];
    $image_size_3 = $_FILES['image_3']['size'];
    $image_tmp_name_3 = $_FILES['image_3']['tmp_name'];
    $image_folder_3 = '../uploaded_img/'.$image_3;
    $details = mysqli_real_escape_string($conn, $_POST['details']);

    $select_product_name = mysqli_query($conn, "SELECT * FROM `products` WHERE name = '$name'") or die ('quer failed');

    if(mysqli_num_rows($select_product_name) > 0){
        $message[] = 'product name already exist!';
    }else{
        $insert_product = mysqli_query($conn, "INSERT INTO `products`
        (name,details,category,price,image_1,image_2,image_3) 
        VALUES ('$name','$details','$category','$price','$image_1','$image_2','$image_3') ") or die('query failed');

        if($insert_product){
            if($image_size_1 > 2000000 || $image_size_2 > 2000000 || $image_size_3 > 2000000){
                $message [] = 'image size is too large';
            }else{
                move_uploaded_file($image_tmp_name_1, $image_folder_1);
                move_uploaded_file( $image_tmp_name_2,  $image_folder_2);
                move_uploaded_file( $image_tmp_name_3, $image_folder_3);
                $message[] = 'product added successfully!';
            }
        }
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>products</title>

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
      <h1>Add Products</h1>
    </div>
</div>

<section class="add_product" >

    <form action="" method="POST" enctype="multipart/form-data">
        <h3>add new product</h3>

        <div class="inputBox">
            <span>product name</span>
            <input type="text" class="box" placeholder="enter product name" name="name" require>
        </div>

        <div class="inputBox">
            <span>product price</span>
            <input type="number" min="0" class="box" placeholder="enter product price" name="price" require>
        </div>

        <div class="inputBox">
            <span>category</span>
            <select name="category" class="box" required>
                <option value="" disabled selected>select category --</option>
                <option value="android_phone">android</option>
                <option value="ios_phone">ios</option>
                <option value="tablets">tablets</option>
                <option value="smart products">smart products</option>
                <option value="computer">computer</option>
            </select>
        </div>

        <div class="inputBox">
            <span>image 01</span>
            <input type="file" name="image_1" accept="image/jpg, image/jpeg, image/png, image/webp, image/avif" class="box" required>
        </div>
        <div class="inputBox">
            <span>image 02</span>
            <input type="file" name="image_2" accept="image/jpg, image/jpeg, image/png, image/webp, image/avif" class="box" required>
        </div>
        <div class="inputBox">
            <span>image 03</span>
            <input type="file" name="image_3" accept="image/jpg, image/jpeg, image/png, image/webp, image/avif" class="box" required>
        </div>
        <textarea name="details" class="box" placeholder="enter product details" cols="40" row="20" ></textarea>
        <input type="submit" name="add_product" class="btn" value="add product">


    </form>
    
</section>


<?php include('js.php');?>
</body>
</html>