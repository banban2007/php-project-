<?php
include('../components/connection.php');

if(isset($_POST['submit'])){

    $filter_name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $name = mysqli_real_escape_string($conn, $filter_name);
    $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $email = mysqli_real_escape_string($conn, $filter_email);
    $filter_pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
    $pass = mysqli_real_escape_string($conn, md5($filter_pass));
    $filter_cpass = filter_var($_POST['cpass'], FILTER_SANITIZE_STRING);
    $cpass = mysqli_real_escape_string($conn, md5($filter_cpass));
 
    $select_users = mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$email'") or die('query failed');
 
    if(mysqli_num_rows($select_users) > 0){
       $message[] = 'user already exist!';
    }else{
       if($pass != $cpass){
          $message[] = 'confirm password not matched!';
       }else{
          mysqli_query($conn, "INSERT INTO user(name, email, password) VALUES('$name', '$email', '$pass')") or die('query failed');
          $message[] = 'registered successfully!';
          header('location:login.php');
       }
    }
 
 }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>

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
    


<!-- admin register start -->

<div class="from_container">
    <div class="glass_container">
        <form action="" method="POST">
            <h3>register now</h3>
                <input type="text" name="name" placeholder="enter your username" class="box" required>
                <input type="email" name="email" placeholder="enter your email" class="box" required>
                <input type="password" name="pass" placeholder="enter your password" class="box" required>
                <input type="password" name="cpass" placeholder="comfirm your password" class="box" required>
                <input type="submit" value="register now" name="submit" class="btn" style="background-color: var(--white); color:var(--text-color-1)">
                <p>already have an acocunt?<a href="login.php"> login now</a></p>
        </form>

    </div>

   
    
</div>

 <!-- admin register end -->
</body>
</html>