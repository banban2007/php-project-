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


<div class="adm">

<header>
    <a href="dashboard.php" class="logo"><i class="fa-solid fa-mobile-screen"></i>Ban Ban Mobile<span> Admin Panel</span></a>

    <div class="profile">
        <p>username : <span><?php echo  $_SESSION['admin_name'];?></span></p>
        <p>email : <span><?php echo $_SESSION['admin_email'];?></span></p>
        <a href="logout.php" class="delete_btn">logout</a>
        <div>new <a href="login.php">login</a> | <a href="register.php">register</a></div>
    </div>

    <nav class="navbar">

   

        <ul>
            <li>
                <a href="#"></a>
                <span class="fa-solid fa-user-tie" id="user-btn">
                    <p class="text">admin profile</p>
                </span>
            </li>

            <li>
                <a href="dashboard.php">
                <span class="ri-home-office-fill"></span>
                <small>Dashboard</small>
                </a>
            </li>

            <li>
                <a href="admin_order_list.php">
                <span class="fa-solid fa-boxes-packing"></span>
                <small>Products</small>
                </a>
            </li>


            <li>
                <a href="admin_order.php">
                <span class="fa-regular fa-inbox"></span>
                <small>Orders</small>
                </a>
            </li>


            <li>
                <a href="admin_user.php">
                <span class="fa-solid fa-users"></span>
                <small>User</small>
                </a>
            </li>

            
            <li>
                <a href="user_messages.php">
                <span class="fa-regular fa-message"></span>
                <small>Message</small>
                </a>
            </li>


        </ul>
    </nav>


</header>

</div>


