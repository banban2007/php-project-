<?php
include('../components/connection.php');
session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    header('location:../admin/login.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>

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
    
<!-- About us -->
<section class="about">

    <div class="box">

        <div class="content">
            <h4>Some words about us</h4>
            <h2><span>Ban" Mobile's </span>Customer Service Must Be The Best In Myanmar.</h2>
            <p>Ban Ban Mobile ကို 2002 ခုနှစ်တွင် မန္တလေးမြို့မှာ စတင်ဖွင့်လှစ်ခဲ့ပြီး ယခုဆိုရင် နှစ် (၂၀) တိတိပြည့်ခဲ့ပြီဖြစ်ပါတယ်။
                စတင်တည်ထောင်ချိန်ကတည်းကနေ ယခုအချိန်ထိ Mobile Phone နဲ့ Smartphone Accessories ပစ္စည်းမျိုးစုံကို မှန်ကန်တဲ့ ဈေးနှုန်း၊ အကောင်းမွန်ဆုံးသော ဝန်ဆောင်မှုများ နဲ့ ရောင်းချလာခဲ့တာဖြစ်ပြီး လက်ရှိအချိန်တွင် ရန်ကုန်မြို့တွင် (၆)ဆိုင် ၊ မန္တလေးမြို့တွင် (၆) ဆိုင် စုစုပေါင်း (၁၂) ဆိုင်တိတိဖွင့်လှစ်ခဲ့ပြီးဖြစ်ပါတယ်။
                “ Ban Ban’s Customer Service Must Be The Best In Myanmar” ဆိုတဲ့ ကျွန်တော်တို့ Ban" Mobile ရဲ့ ဆောင်ပုဒ်ကို လက်ကိုင်ထားပြီး ဝယ်ယူသူ Customer များအတွက် အကောင်းဆုံးဝန်ဆောင်မှုပေးနေတဲ့အပြင် လူငယ်များရဲ့ အလုပ်အကိုင် အခွင့်အလမ်းတွေတိုးတက်စေဖို့နဲ့ လူငယ်တွေနဲ့ဖွဲ့စည်းထားတဲ့ သွက်လက်တက်ကြွတဲ့ Organization တစ်ခုအနေနဲ့ ရှေ့ဆက်ပြီး လျှောက်လှမ်းနေပါ တယ်။
                Customer များရဲ့ ဝယ်ယူမှုတိုင်းမှာ စိတ်ကျေနပ်မှု အပြည့်အဝပေးနိုင်ဖို့နဲ့ After Sales Service အကောင်းဆုံးပေးနိုင်ဖို့အတွက် ကျွန်တော်တို့ Ban Ban Mobile မှ အစဉ်အမြဲ ကြိုစားလျက်ရှိနေပါတယ်။</p>
                <a href="contact.php" class="btn">Content Us</a>
        </div>

        <div class="image">
            <img src="../img/aboutus.png" alt="">
        </div>

    </div>

</section>
<!-- About us end -->


<?php include('footer.php');?>

<!-- js link -->
<script src="../js/script.js"></script>

</body>
</html>