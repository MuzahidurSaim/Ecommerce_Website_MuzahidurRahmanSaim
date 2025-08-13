<?php
if (isset($_GET['edit_admin']) && isset($_SESSION['username'])) {
    $user_session_name = $_SESSION['username'];
    $select_query = "SELECT * FROM `admin_table` WHERE admin_name='$user_session_name'";
    $result_query = mysqli_query($con, $select_query);
    $row_fetch = mysqli_fetch_assoc($result_query);
    $admin_id = $row_fetch['admin_id'];
    $admin_name = $row_fetch['admin_name'];
    $admin_email = $row_fetch['admin_email'];
}

if (isset($_POST['admin_update'])) {
    $update_id = $admin_id;
    $admin_name = trim($_POST['username']);
    $admin_email = trim($_POST['email']);

    if ($admin_name !== '' && $admin_email !== '') {
        $update_data = "UPDATE `admin_table` SET admin_name='$admin_name', admin_email='$admin_email' WHERE admin_id=$update_id";
        $result_query_update = mysqli_query($con, $update_data);
        if ($result_query_update) {
            echo "<script>alert('Data updated successfully');</script>";
            echo "<script>window.open('admin_logout.php', '_self');</script>";
        } else {
            echo "<script>alert('Update failed');</script>";
        }
    } else {
        echo "<script>alert('Please fill in all fields');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>SAIM - Edit account <?= htmlspecialchars($_SESSION['username'] ?? 'Admin') ?></title>
    <!-- Bootstrap and CSS links unchanged -->
</head>
<body>
    <h3 class="text-success my-4 text-center">Edit Account</h3>
    <form action="" method="post">
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="username" value="<?= htmlspecialchars($admin_name ?? '') ?>">
        </div>
        <div class="form-outline mb-4">
            <input type="email" class="form-control w-50 m-auto" name="email" value="<?= htmlspecialchars($admin_email ?? '') ?>">
        </div>
        <div class="w-50 m-auto py-2">
            <input type="submit" value="Update" class="bg-info py-2 px-3 border-0 m-auto " name="admin_update">
        </div>
    </form>
</body>
</html>
