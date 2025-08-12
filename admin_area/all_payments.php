<h3 class="text-center text-success">All Payments</h3>
<table class="table table-bordered mt-4 text-center">
    <thead class="table_head">
        <?php
            $get_payments="SELECT * FROM `user_payments`";
            $result=mysqli_query($con, $get_payments);
            $row_count=mysqli_num_rows($result);
            if($row_count==0) {
                echo "<h2 class='text-danger text-center mt-5'>No payments received yet</h2>";
            }
            else {
                echo "
                    <tr>
                    <th>SL no</th>
                    <th>Invoice number</th>
                    <th>Amount</th>
                    <th>Payment mode</th>
                    <th>Order Date</th>
                    <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody class='table_body'>
                ";
                $number=0;
                while($row_data=mysqli_fetch_assoc($result)) {
                    $payment_id=$row_data['payment_id'];
                    $order_id=$row_data['order_id'];
                    $invoice_number=$row_data['invoice_number'];
                    $amount=$row_data['amount'];
                    $payment_mode=$row_data['payment_mode'];
                    $date=$row_data['date'];
                    $number++;
                    echo "
                        <tr>
                            <td>$number</td>
                            <td>$invoice_number</td>
                            <td>$amount</td>
                            <td>$payment_mode</td>
                            <td>$date</td>
                            <td><a href='index.php?delete_payment=$payment_id' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
                        </tr>
                    ";
                }
            }
        ?>
    </tbody>
</table>