<?php
include('../components/connection.php');
session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    header('location:../admin/login.php');
}

if(isset($_POST['add_to_wishlist'])){
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];

    $check_wishlist_numbers = mysqli_query($conn,"SELECT * FROM `wishlist` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

    if(mysqli_num_rows($check_wishlist_numbers) > 0){
        $message[] = 'already added to wishlist';
    }else{
        mysqli_query($conn, "INSERT INTO `wishlist` (user_id, pid, name, price, image) VALUES('$user_id', '$product_id', '$product_name', '$product_price', '$product_image')")  or die('query failed');
        $message[] = 'product added to wishlist';
    }


}


if(isset($_POST['add_to_cart'])){
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];

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
    <title>Home</title>

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

<!-- slide -->
<section>

    <div class="banner_slider">

        <div class="swiper_wrapper">

            <div class="slide active">
                <div class="content">
                    <span>Available Now</span>
                    <h1>Profoundly Powerful</h1>
                    <h3>Trending form mobile Laptop and headphone style collection</h3>
                    <a href="category.php?category=ios_phone" class="btn">Shop Now</a>
                    <div class="icon">
                        <a href="#" class="fa-brands fa-facebook"></a>
                        <a href="#" class="fa-brands fa-telegram"></a>
                    </div>
                </div>
                <div class="image">
                    <img src="../img/16pm.png">
                </div>
            </div>

            <div class="slide">
                <div class="content">
                    <span>Available Now<span>
                    <h1>Gaming Laptop</h1>
                    <h3>Trending form mobile Laptop and headphone style collection</h3>
                    <a href="category.php?category=Computer" class="btn">Shop Now</a>
                    <div class="icon">
                        <a href="#" class="fa-brands fa-facebook"></a>
                        <a href="#" class="fa-brands fa-telegram"></a>
                    </div>
                </div>
                <div class="image">
                    <img src="../img/rog.png">
                </div>
            </div>

            <div class="slide">
                <div class="content">
                    <span>Special</span>
                    <h1>Headphone</h1>
                    <h3>Trending form mobile Laptop and headphone style collection</h3>
                    <a href="category.php?category=Smart Products" class="btn">Shop Now</a>
                    <div class="icon">
                        <a href="#" class="fa-brands fa-facebook"></a>
                        <a href="#" class="fa-brands fa-telegram"></a>
                    </div>
                </div>
                <div class="image">
                    <img src="../img/headphone.png">
                </div>
            </div>

        </div>
        
        <div id="slide-next" onclick="next()" class="ri-arrow-right-s-line"></div>
        <div id="slide-prev" onclick="prev()" class="ri-arrow-left-s-line"></div>

    </div>

</section>
<!-- slide end -->

<!-- categroy -->
<section class="category">
    <div class="section_category">
        <p class="section_category_p" style="text-transform: none;">
        categories
        </p>
    </div>
    <div class="section_header">
        <h2 class="section_title">Browse by Category</h2>
    </div>
    

    <div class="box_container">
        

    <a href="category.php?category=Android_phone">
            <div class="box">
                <div class="image">
                    <img src="../img/samsung.png" alt="">
                </div>
                <h3>Android Phones</h3>
            </div>
        </a>

        <a href="category.php?category=ios_phone">
            <div class="box">
                <div class="image">
                    <img src="../img/ip.png" alt="">
                </div>
                <h3>iPhones</h3>
            </div>
        </a>

        <a href="category.php?category=Tablets">
            <div class="box">
                <div class="image">
                    <img src="../img/tablets.png" alt="">
                </div>
                <h3>Tablets</h3>
            </div>
        </a>
        
        <a href="category.php?category=Smart Products">
            <div class="box">
                <div class="image">
                    <img src="../img/mobile_acc.png" alt="">
                </div>
                <h3>smart products</h3>
            </div>
        </a>
       
        <a href="category.php?category=Computer">
            <div class="box">
                <div class="image">
                    <img src="../img/gaminglt.png" alt="">
                </div>
                <h3>computers</h3>
            </div>
        </a>
      
    </div>
    
</section>
<!-- categroy end -->



<!-- all brand banner -->

<section class="alb_banner">
    <div class="image">
        <a href="products.php">
            <img src="../img/Price-List.webp" alt="">
        </a>
    </div>
</section>


<!-- all brand banner end -->


<section class="products">

    <div class="section_category">
        <p class="section_category_p" style="text-transform: none;">
        our products
        </p>
    </div>
    <div class="section_header">
        <h2 class="section_title">Explore Our Porducts</h2>
    </div>

    <div class="box_container">


        <?php
           $select_products = mysqli_query($conn, "SELECT * FROM `products`LIMIT 8") or die('query failed');
           if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){

        ?>

        <form action="" method="POST" class="box">
            <a href="view_page.php?pid=<?php echo $fetch_products['id'];?>" class="fas fa-eye"></a>
            <button type="submit" class="fas fa-basket-shopping" name="add_to_cart"></button>
            <button type="submit" class="fa-regular fa-heart" name="add_to_wishlist"></button>
            <div class="image">
                <img src="../uploaded_img/<?php echo $fetch_products['image_1'];?>" alt="">
                <a href="category.php?category=<?php echo $fetch_products['category'];?>" style="color:var(--primary-color); font-size:1.2rem;"><?php echo $fetch_products['category'];?></a>
            </div>
            
            <div class="name"><?php echo $fetch_products['name'];?></div>
            <div class="flex">
                <div class="price"><?php echo $fetch_products['price'];?> /-Ks</div>
                <input type="hidden" name="product_quantity" value="1" min="1" class="qty">
            </div>
            <input type="hidden" name="product_id" value="<?php echo $fetch_products['id'];?>">
            <input type="hidden" name="product_name" value="<?php echo $fetch_products['name'];?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_products['price'];?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_products['image_1'];?>">

        </form>
        <?php
            }
            }else{
            echo ' <p class="empty">no products added yet!</p>';
            }
        ?>


    </div>
    <div class="container_btn">
        <a href="products.php">VIEW ALL PRODUCTS</a>
    </div>

</section>

<!-- products end -->

<!-- big banner start -->
    <div class="big_banner">

            <div class="main-image">
                <a href="category.php?category=Smart Products">
                <img src="../img/Pb.webp" alt="Main Image">
                </a>
               
            </div>
            <div class="side-images">
                <div class="side-image">
                    <a href="category.php?category=Smart Products">
                    <img src="../img/Huawei-Watch-GT5-Web.webp" alt="Side Image 1">
                    </a>
                </div>
                <div class="side-image">
                    <a href="category.php?category=Smart Products">
                    <img src="../img/Beat-Solo.webp" alt="Side Image 2">
                    </a>
                   
                </div>
            </div>

        </div>

<!-- big banner end -->



<?php include('footer.php');?>

<!-- js link -->
<script src="../js/script.js"></script>
</body>
</html>