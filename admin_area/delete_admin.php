<h3 class="text-danger my-4 text-center">Delete Account</h3>
<form action="" method="post" class="mt-5">
    <div class="form-outline mb-4">
        <input type="submit" class="form-control w-50 m-auto" name="delete" value="Delete Account">
    </div>
    <div class="form-outline mb-4">
        <input type="submit" class="form-control w-50 m-auto" name="do_not_delete" value="Don't Delete Account">
    </div>
</form>

<?php
if (isset($_SESSION['username'])) {
    $username_session = $_SESSION['username'];

    if (isset($_POST['delete'])) {
        $delete_query = "DELETE FROM `admin_table` WHERE admin_name='$username_session'";
        $result = mysqli_query($con, $delete_query);
        if ($result) {
            session_destroy();
            echo "<script>alert('Account deleted successfully');</script>";
            echo "<script>window.open('../index.php', '_self');</script>";
        } else {
            echo "<script>alert('Failed to delete account');</script>";
        }
    }

    if (isset($_POST['do_not_delete'])) {
        echo "<script>alert('Account deletion cancelled');</script>";
        echo "<script>window.open('index.php', '_self');</script>";
    }
} else {
    echo "<script>alert('No admin session found');</script>";
    echo "<script>window.open('../index.php', '_self');</script>";
}
?>
