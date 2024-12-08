<?php
include('../components/connection.php');
session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:login.php');
}

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `message` WHERE id = '$delete_id'") or die('query failed');
    header('location:user_messages.php');
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>message</title>

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
      <h1>Users Message</h1>
    </div>
</div>

<section class="messages">

<div class="box_container">
        <?php
        $select_messages = mysqli_query($conn, "SELECT * FROM `message`") or die('query failed');
        if(mysqli_num_rows($select_messages) > 0){
            while($fetch_messages = mysqli_fetch_assoc($select_messages)){

       
        ?>
        <div class="box">
            <p>user id :<span><?php echo $fetch_messages['user_id'];?></span></p>
            <p>name :<span><?php echo $fetch_messages['name'];?></span></p>
            <p>email :<span><?php echo $fetch_messages['email'];?></span></p>
            <p>phone number :<span><?php echo $fetch_messages['number'];?></span></p>
            <p>Message :<span><?php echo $fetch_messages['message'];?></span></p>
            <a href="user_messages.php?delete=<?php echo $fetch_messages['id'];?>" onclick="return confirm('delete this message?')" class="delete_btn">Delete</a>
        </div>
        <?php
             }
            }else{
                echo '<p class="empty">you have no message!</p>';
            }
        ?>

    </div>
</section>

<?php include('js.php');?>
</body>
</html>