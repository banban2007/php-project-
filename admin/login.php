<?php
include('../components/connection.php');

 session_start();
if(isset($_COOKIE['email']) && isset($_COOKIE['pass'])){
    $email = $_COOKIE['email'];
    $pass = $_COOKIE['pass'];
}else{
    $email = $pass ="";
}
 if(isset($_POST['submit'])){

    $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $email = mysqli_real_escape_string($conn, $filter_email);
    $filter_pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
    $pass = mysqli_real_escape_string($conn, md5($filter_pass));
 
    $select_users = mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$email' AND password = '$pass'") or die('query failed');
 
 
    if(mysqli_num_rows($select_users) > 0){
       
       $row = mysqli_fetch_assoc($select_users);
 
       if($row['user_type'] == 'admin'){
 
        $_SESSION['admin_name'] = $row['name'];
        $_SESSION['admin_email'] = $row['email'];
        $_SESSION['admin_id'] = $row['id'];
        header('location: dashboard.php');
 
       }elseif($row['user_type'] == 'user'){
 
        $_SESSION['user_name'] = $row['name'];
        $_SESSION['user_email'] = $row['email'];
        $_SESSION['user_id'] = $row['id'];

        if(isset($_REQUEST['remember'])) {
            setcookie('email', $_REQUEST['email'], time() + (86400 * 30), "/", "", false, true);
            setcookie('pass', $_REQUEST['pass'], time() + (86400 * 30), "/", "", false, true);
        }
        header('location: ../php/home.php');

       }else{
          $message[] = 'no user found!';
       }

    }else{
       $message[] = 'incorrect email or password!';
    }
 
 }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

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



<!-- login start -->

<div class="from_container">

    <div class="glass_container">
        <form action="" method="POST">
            <h3>Login Now</h3>
                <input type="emali" value="<?php echo $email;?>" name="email" placeholder="enter your email" class="box" required>
                <input type="password" value="<?php echo $pass;?>" name="pass" placeholder="enter your password" class="box" required>
                <div class="remember">
                    <input type="checkbox" name="remember" id="remember-me">
                    <label for="remember-me">Remember me</label>
                </div>
                <input type="submit" value="login now" name="submit" class="btn" style="background-color: var(--white); color:var(--text-color-1)">
                <p>dont't have an acocunt ?<a href="register.php">register now</a></p>
        </form>

    </div>

 
    
</div>

<!-- login end -->

</body>
</html>