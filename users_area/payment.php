<?php
    /* connecting to the database */
    include('../includes/connect.php');
    include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAIM - Payment</title>

    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel = "stylesheet" href = "../style.css">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            overflow-x: hidden;
        }

        .logo {
            width:4%;
            height:2%;
        }

        .payment_img{
            width: 90%;
            margin: auto;
            display: block;
        }
    </style>
</head>
<body>
    <div class = "container-fluid p-0">

        <!-- php code to get the user ip address -->
        <?php
            $user_ip=getUserIpAddress();
            $get_user="SELECT * FROM `user_table` WHERE user_ip='$user_ip'";
            $result=mysqli_query($con, $get_user);
            $run_query=mysqli_fetch_array($result);
            $user_id=$run_query['user_id'];
        ?>

        <!-- fourth child -->
        <div class="container mb-3">
            <h2 class="text-center text-info py-1">Payment Options</h2>
            <div class="row d-flex justify-content-center align-items-center my-3">
                <div class="col-md-6">
                    <a href="https://www.paypal.com" target="_blank"><img src="../images/payment.jpg" class="payment_img" alt=""></a>
                </div>
                <div class="col-md-6">
                    <a href="order.php?user_id=<?=$user_id?>"><h2 class="text-center ">Pay Offline</h2></a>
                </div>
            </div>
        </div>

    </div>

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>