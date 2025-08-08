<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAIM - My Orders<?=$_SESSION['username']?></title>

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

        .orders_head th {
            background-color: var(--bs-info);
        }

        .orders_body td {
            background-color: var(--bs-secondary);
            color: var(--bs-light);
        }

    </style>
</head>
<body>

    <?php
        $username=$_SESSION['username'];
        $get_user="SELECT * FROM `user_table` WHERE user_name='$username'";
        $result=mysqli_query($con, $get_user);
        $row_fetch=mysqli_fetch_assoc($result);
        $user_id=$row_fetch['user_id'];
    ?>

    <h3 class="text-success my-4">My Orders</h3>

    <table class="table table-bordered mt-5">
        <thead class="orders_head">
            <tr>
                <th>SL no</th>
                <th>Amount Due</th>
                <th>Total products</th>
                <th>Invoice number</th>
                <th>Date</th>
                <th>Complete/Incomplete</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody class="orders_body">
            <?php
                $get_order_details="SELECT * FROM `user_orders` WHERE user_id=$user_id";
                $result_orders=mysqli_query($con, $get_order_details);
                $sl_number=1;
                while($row_orders=mysqli_fetch_assoc($result_orders)) {
                    $order_id=$row_orders['order_id'];
                    $amount_due=$row_orders['amount_due'];
                    $total_products=$row_orders['total_products'];
                    $invoice_number=$row_orders['invoice_number'];
                    $order_date=$row_orders['order_date'];
                    $order_status=$row_orders['order_status'];
                    if($order_status=='pending') {
                        $order_status='Incomplete';
                    } else {
                        $order_status='Complete';
                    }
                    echo "
                        <tr>
                            <td>$sl_number</td>
                            <td>$amount_due</td>
                            <td>$total_products</td>
                            <td>$invoice_number</td>
                            <td>$order_date</td>
                            <td>$order_status</td>
                            <td><a href='confirm_payment.php' class='text-light'>Confirm</a></td>
                        </tr>
                    ";
                    $sl_number++;
                }
            ?>
        </tbody>
    </table>
</body>
</html>