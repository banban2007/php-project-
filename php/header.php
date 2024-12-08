<?php
if(isset($message)){
    foreach($message as $message){
        echo '
        <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>
        ';
    }
}
?>



<!-- header  -->
<header>
            <a href="home.php" class="logo"><i class="fa-solid fa-mobile-screen"></i>Ban Ban Mobile<span> Store</span></a>
        <!-- navbar start -->
        <nav class="navbar">

            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="#">Products </a> <i class="fas fa-caret-down" ></i>

                    <ul>
                        <li><a href="#">Smart Phones</a><i class="fas fa-caret-right"></i>
                                <ul>
                                    <li><a href="category.php?category=Android_phone">Android Phones</a></li>
                                    <li><a href="category.php?category=ios_phone">ios Phones</a></li>
                                </ul>
                        </li>
                            <li><a href="category.php?category=Tablets">Tables</a></li>
                            <li><a href="category.php?category=Smart Products">Smart Products</a></li>
                            <li><a href="category.php?category=Computer">Computers</a></li>
                     </ul>


                </li>
                <li><a href="order.php">Order</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>



        </nav>
        <!-- navbar end -->
        
        <!-- icons start  -->
        <div class="icons">
            <i class="fa-solid fa-bars" id="buger-btn"></i>
            <a href="search_page.php"><i class="fa fa-search" id="search-btn"></i></a>
            <?php
                $select_wishlist_count = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE user_id = '$user_id'") or die('query failed');
                $wishlist_num_rows = mysqli_num_rows($select_wishlist_count);
            ?>
            <a href="wishlist.php"><i class="fa-regular fa-heart" id="whislist-btn"><span><?php echo $wishlist_num_rows;?></span></i></a>
            <?php
                $select_cart_count = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
                $cart_num_rows = mysqli_num_rows($select_cart_count);
            ?>
            <a href="shooping_cart.php"><i class="fa-solid fa-basket-shopping" id="cart-btn"><span><?php echo $cart_num_rows;?></span></i></a>
            <i class="fa-solid fa-user" id="login-btn"></i>
        </div>
        <!-- icons end -->

        <div class="profile">
            <p>username : <span><?php echo  $_SESSION['user_name'];?></span></p>
            <p>email : <span><?php echo $_SESSION['user_email'];?></span></p>
            <a href="../admin/logout.php" class="delete_btn">logout</a>
            <div>new <a href="../admin/login.php">login</a> | <a href="../admin/register.php">register</a></div>
        </div>
    
       
    </header>
<!-- header end -->