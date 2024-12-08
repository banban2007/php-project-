<?php
include('../components/connection.php');
session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:login.php');
}


if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $select_delete_image = mysqli_query($conn, "SELECT image_1,image_2,image_3 FROM `products` WHERE id = '$delete_id'")
     or die('query falied');
    $fetch_delete_image = mysqli_fetch_assoc($select_delete_image);
    unlink('../uploaded_img/'.$fetch_delete_image['image_1']);
    unlink('../uploaded_img/'.$fetch_delete_image['image_2']);
    unlink('../uploaded_img/'.$fetch_delete_image['image_3']);
    mysqli_query($conn, "DELETE FROM `products` WHERE id = '$delete_id'") or die('query failed');
    mysqli_query($conn, "DELETE FROM `wishlist` WHERE pid = '$delete_id'") or die('query failed');
    mysqli_query($conn, "DELETE FROM `cart` WHERE pid = '$delete_id'") or die('query failed');
    header('location:admin_order_list.php');
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
      <h1>Products List</h1>
    </div>
</div>


<section class="show_product">
    <div class="records box_container">

        <div class="record_header">
            <div class="add">
                <a href="admin_products.php">Add Product <i class="fa-solid fa-plus"></i></a>
            </div>
        </div>
                    <div>
                        <table width="100%">
                            <thead>
                                <tr>
                                    <th><span class="ri-expand-up-down-fill"></span> IMAGE</th>
                                    <th><span class="ri-expand-up-down-fill"></span> NAME</th>
                                    <th><span class="ri-expand-up-down-fill"></span> PRICE</th>
                                    <th><span class="ri-expand-up-down-fill"></span> CATEGORY</th>
                                    <th><span class="ri-expand-up-down-fill"></span> DETAILS</th>
                                    <th><span class="ri-expand-up-down-fill"></span> ACTION</th>
                                </tr>
                            </thead>
                            <tbody>

                        <?php
                            $select_products = mysqli_query($conn,"SELECT * FROM `products`") or die('query failed');
                            if(mysqli_num_rows($select_products) > 0){
                                while($fetch_products = mysqli_fetch_assoc($select_products)){
                        ?>

                        <tr>
                                <td>
                                    <div class="image">
                                      <img src="../uploaded_img/<?php echo $fetch_products['image_1'];?>" class="img" alt="">
                                    </div>
                                </td>
                                <td><div class="name"><?php echo $fetch_products['name'];?></div></td>
                                <td><div class="price"><?php echo $fetch_products['price'];?> Ks</div></td>
                                <td><div class="category"><?php echo $fetch_products['category'];?></div></td>
                                <td><div class="details"><?php echo $fetch_products['details'];?></div></td>
                                <td>
                                    <div class="action">
                                    <a href="admin_update_product.php?update=<?php echo $fetch_products['id'];?>" class="fa-regular fa-pen-to-square" style="background-color: green;"></a>
                                    <a href="admin_order_list.php?delete=<?php echo $fetch_products['id'];?>" class="ri-delete-bin-line"  style="background-color: red;" onclick="return confirm('delete this products ?')"></a>
                                    </div>
                                    <?php
                                        }
                                    }else{
                                        echo '<p class="empty">no products add yet!</p>';
                                    }
                                    ?>
                                
                                </td>
                                
                        </tr>    
                           
                                

                            </tbody>
                        </table>
                    </div>
                
        </div>
    
</section>





<?php include('js.php');?>
</body>
</html>