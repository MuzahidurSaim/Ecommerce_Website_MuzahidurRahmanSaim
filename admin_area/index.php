<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <!-- css file -->
    <link rel = "stylesheet" href = "../style.css">
</head>
<body>

    <div class="container-fluid p-0">

        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">

            <!-- navbar -->
            <div class="container-fluid">
                <img src="../images/logo.png" alt="" class="logo">

                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link">Welcome Guest</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <!-- second child -->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>

        <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-3">
                    <a href="#"><img src="../images/mango.jpg" alt="" class="admin_image"></a>
                    <p class="text-light text-center">Admin Name</p>
                </div>
                <div class="button text-center">
                    <button class="my-3"><a href="" class="nav-link text-light bg-info m-1">Insert Products</a></button>
                    <button><a href="" class="nav-link text-light bg-info m-1">View Products</a></button>
                    <button><a href="" class="nav-link text-light bg-info m-1">Insert Categories</a></button>
                    <button><a href="" class="nav-link text-light bg-info m-1">View Categories</a></button>
                    <button><a href="" class="nav-link text-light bg-info m-1">Insert Brands</a></button>
                    <button><a href="" class="nav-link text-light bg-info m-1">View Brands</a></button>
                    <button><a href="" class="nav-link text-light bg-info m-1">All Orders</a></button>
                    <button><a href="" class="nav-link text-light bg-info m-1">All Payments</a></button>
                    <button><a href="" class="nav-link text-light bg-info m-1">List Users</a></button>
                    <button><a href="" class="nav-link text-light bg-info m-1">Logout</a></button>
                </div>
            </div>
        </div>

    </div>

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>