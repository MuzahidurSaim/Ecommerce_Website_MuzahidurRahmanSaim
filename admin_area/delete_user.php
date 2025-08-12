<?php
    if(isset($_GET['delete_user'])) {
        $delete_user=$_GET['delete_user'];
        $delete_query="DELETE FROM `users` WHERE user_id=$delete_user";
        $result=mysqli_query($con, $delete_query);
        if($result) {
            echo "<script>alert('User has been deleted successfully')</script>";
            echo "<script>window.open('./index.php?all_users', '_self')</script>";
        }
    }
?>