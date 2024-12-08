<?php
include('../components/connection.php');
session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    header('location:../admin/login.php');
}

if(isset($_POST['send'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $msg = mysqli_real_escape_string($conn, $_POST['message']);

    $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name = '$name' 
    AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');

    if(mysqli_num_rows($select_message) > 0){
        $message[] = 'message send already!';
    }else{
        mysqli_query($conn, "INSERT INTO `message`(user_id,name,email,number,message) 
        VALUES ('$user_id', '$name', '$email', '$number', '$msg')") or die('query faild');
        $message[] = 'message send successfully!';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content</title>

     <!-- remix icon cdn link  -->
     <link href="https://cdn.jsdelivr.net/npm/remixicon@3.0.0/fonts/remixicon.css" rel="stylesheet">

    <!-- custom css -->
     <link rel="stylesheet" type="text/css" href="../css/style.css">

    <!-- farvicon -->
     <link rel="icon" href="../img/farvicon1.png">

     <!-- cdn link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

<?php include('header.php');?>
<!-- content  -->

<section class="contact">

    <div class="box">

        <form action="" method="post">
            <h3>CONTACT US FOR ANY QUESTIONS</h3>
            <input type="text" name="name" class="box" placeholder="enter your name" required>
            <input type="email" name="email" class="box" placeholder="enter your email" required>
            <input type="number" name="number" class="box" placeholder="enter your number" required>
            <textarea name="message" class="box" id="" cols="30" rows="10" placeholder="enter your message"></textarea>
            <input type="submit" value="send message" name="send" class="btn">
        </form>

        <iframe class="map"
            src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3818.9375285244955!2d96.12449607492155!3d16.829454983965746!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTbCsDQ5JzQ2LjAiTiA5NsKwMDcnMzcuNSJF!5e0!3m2!1sen!2smm!4v1731949620976!5m2!1sen!2smm"
            height="450" allowfullscreen="" loading="lazy">
         </iframe>


    </div>

</section>
 <!-- content end -->

<?php include('footer.php');?>

<!-- js link -->
<script src="../js/script.js"></script>
    
</body>
</html>