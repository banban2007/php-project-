<?php
include('../components/connection.php');
session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:login.php');
}


if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `user` WHERE id = '$delete_id'") or die('query failed');
    header('location:admin_user.php');
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user accounts</title>

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
      <h1>Users Account </h1>
    </div>
</div>

<section class="user">
    <div class="box_container">
        <?php
        $select_users = mysqli_query($conn, "SELECT * FROM `user`") or die('query failed');
        if(mysqli_num_rows($select_users) > 0){
            while($fetch_users = mysqli_fetch_assoc($select_users)){

       
        ?>
        <div class="box">
            <p>user id :<span><?php echo $fetch_users['id'];?></span></p>
            <p>name :<span><?php echo $fetch_users['name'];?></span></p>
            <p>email :<span><?php echo $fetch_users['email'];?></span></p>
            <p>user type :<span style="color:<?php if($fetch_users['user_type'] == 'admin'){ echo 'var(--orange)';}?>"><?php echo $fetch_users['user_type'];?></span></p>
            <a href="admin_user.php?delete=<?php echo $fetch_users['id'];?>" onclick="return confirm('delete this user?')" class="delete_btn">Delete</a>
        </div>
        <?php
             }
            }
        ?>

    </div>
</section>

<?php include('js.php');?>
</body>
</html>