<?php
session_start();

// Redirect to the login page if the user is not logged in
if (!isset($_SESSION['profile_name'])) {
    header("Location: login.php");
    exit();
}

// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "INVENTORY";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user details based on the logged-in user's username
$profile_name = $_SESSION['profile_name'];
$sql = "SELECT * FROM admin WHERE username = '$profile_name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User details found, fetch and display them
    $row = $result->fetch_assoc();
    $full_name = $row['full_name'];
    $email = $row['email'];
    $password = $row['password'];
    $phone = $row['phonenumber'];
} else {
    // User details not found, display error or handle as per your requirement
    $username = "N/A";
    $email = "N/A";
    $password = "N/A";
    $phone = "N/A";
}

// Handle form submission for updating profile
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_full_name = $_POST['full_name'];
    $new_email = $_POST['email'];
    $new_password = $_POST['password'];
    $new_phone = $_POST['phone'];

    // Update user's profile in the database
    $update_sql = "UPDATE admin SET full_name='$new_full_name', email='$new_email', password='$new_password', phonenumber='$new_phone' WHERE username='$profile_name'";
    if ($conn->query($update_sql) === TRUE) {
        // Redirect back to profile page after successful update
        header("Location: profile.php");
        exit();
    } else {
        echo "Error updating profile: " . $conn->error;
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template" />
    <meta name="description" content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework" />
    <meta name="robots" content="noindex,nofollow" />
    <title>Admin - Profile</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <link rel="icon" type="image/png" href="/img/favicon.png">
    <link href="css/style.min.css" rel="stylesheet" />
</head>
<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <a class="navbar-brand" href="home.php">
                        <b class="logo-icon">
                            <img src="/img/logo2.png" alt="homepage" style="width: 70%; max-width: 150px; display: block; margin: 10px auto 0;" />
                        </b>
                    </a>
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                <ul class="navbar-nav me-auto ms-2">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="home.php"><i class="fa fa-home"></i></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav d-none d-md-block d-lg-none">
                        <li class="nav-item">
                            <a class="nav-toggler nav-link waves-effect waves-light text-white" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto d-flex align-items-center">
                        <li>
                            <a class="profile-pic" href="#">
                                <img src="/img/profile.png" alt="user-img" width="36"
                                    class="img-circle" />
                                <span class="text-white font-medium">
                                    <?php echo $profile_name; ?>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="profile.php" aria-expanded="false">
                                <i class="fa fa-user" aria-hidden="true"></i><span class="hide-menu">Profile</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="owner-property.php" aria-expanded="false">
                                <i class="fa fa-building" aria-hidden="true"></i><span class="hide-menu">Owner Property Report</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="customer-report.php" aria-expanded="false">
                                <i class="fas fa-address-card" aria-hidden="true"></i><span class="hide-menu">Customers Report</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="page-wrapper">
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Profile page</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex"></div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-xlg-3 col-md-12">
                        <div class="white-box">
                            <div class="user-bg">
                                <div class="overlay-box">
                                    <div class="user-content">
                                        <a href="javascript:void(0)"><img src="/img/profile.png" class="thumb-lg img-circle" alt="img" /></a>
                                        <h4 class="text-white mt-2"><?php echo $full_name; ?></h4>
                                        <h5 class="text-white mt-2"><?php echo $email; ?></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="user-btm-box mt-5 d-md-flex">
                                <div class="col-md-4 col-sm-4 text-center">
                                    <h1 style="font-size:30px;"><?php echo $phone; ?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-xlg-9 col-md-12">
                        <div class="card">
                            <div class="card-body">
                            <form class="form-horizontal form-material" method="post">
        <div class="form-group mb-4">
            <label class="col-md-12 p-0">Full Name</label>
            <div class="col-md-12 border-bottom p-0">
                <input type="text" value="<?php echo $full_name; ?>" class="form-control p-0 border-0" name="full_name" />
            </div>
        </div>
        <div class="form-group mb-4">
            <label for="example-email" class="col-md-12 p-0">Email</label>
            <div class="col-md-12 border-bottom p-0">
                <input type="email" value="<?php echo $email; ?>" class="form-control p-0 border-0" name="email" />
            </div>
        </div>
        <div class="form-group mb-4">
            <label class="col-md-12 p-0">Password</label>
            <div class="col-md-12 border-bottom p-0">
                <input type="password" value="<?php echo $password?>" class="form-control p-0 border-0" name="password" />
            </div>
        </div>
        <div class="form-group mb-4">
            <label class="col-md-12 p-0">Phone No</label>
            <div class="col-md-12 border-bottom p-0">
                <input type="text" value="<?php echo $phone; ?>" class="form-control p-0 border-0" name="phone" />
            </div>
        </div>
        <div class="form-group mb-4">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-success">Update Profile</button>
            </div>
        </div>
    </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer text-center">
            2024 © Inventory Management System brought to you by Presidency Real Estate</a>
            </footer>
        </div>
    </div>
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <script src="js/waves.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>
