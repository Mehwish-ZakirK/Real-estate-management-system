<?php
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['data-type'])) {
        if ($_POST['data-type'] == 'owner-property') {
            $owner_name = $_POST['owner_name'];
            $mobile_number = $_POST['mobile_number'];
            $property_location = $_POST['property_location'];
            $property_type = $_POST['property_type'];
            $price_per_sqrft = $_POST['price_per_sqrft'];
            $status = $_POST['status'];

            $sql = "INSERT INTO owner_property (owner_name, mobile_number, property_location, property_type, price_per_sqrft, status) VALUES ('$owner_name', '$mobile_number', '$property_location', '$property_type', '$price_per_sqrft', '$status')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } elseif ($_POST['data-type'] == 'customer-detail') {
            $name = $_POST['customer_name'];
            $number = $_POST['customer_number'];
            $requirement = $_POST['customer_requirement'];

            $sql = "INSERT INTO customer_detail (name, number, requirement) VALUES ('$name', '$number', '$requirement')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords" content="admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template" />
    <meta name="description" content="Ample Admin Lite is powerful and clean admin dashboard template, inspired by Bootstrap Framework" />
    <meta name="robots" content="noindex,nofollow" />
    <title>Admin - Data Management</title>
    <link rel="icon" type="image/png" sizes="16x16" href="/img/logo1.png" />
    <link href="css/style.min.css" rel="stylesheet" />
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
                    <a class="navbar-brand" href="index.html">
                        <b class="logo-icon">
                            <img src="/img/logo2.png" alt="homepage" style="width: 70%; max-width: 150px; display: block; margin: 10px auto 0;" />
                        </b>
                    </a>
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav d-none d-md-block d-lg-none">
                        <li class="nav-item">
                            <a class="nav-toggler nav-link waves-effect waves-light text-white" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto d-flex align-items-center">
                        <li class="in">
                            <form role="search" class="app-search d-none d-md-block me-3">
                                <input type="text" placeholder="Search..." class="form-control mt-0" />
                                <a href="" class="active"><i class="fa fa-search"></i></a>
                            </form>
                        </li>
                        <li>
                            <a class="profile-pic" href="#">
                                <img src="plugins/images/users/varun.jpg" alt="user-img" width="36" class="img-circle" /><span class="text-white font-medium">Steave</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.html" aria-expanded="false">
                                <i class="far fa-clock" aria-hidden="true"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="profile.html" aria-expanded="false">
                                <i class="fa fa-user" aria-hidden="true"></i><span class="hide-menu">Profile</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="basic-table.html" aria-expanded="false">
                                <i class="fa fa-table" aria-hidden="true"></i><span class="hide-menu">Basic Table</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="data-management.php" aria-expanded="false">
                                <i class="fas fa-cog" aria-hidden="true"></i><span class="hide-menu">Data Management</span></a>
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
                        <h4 class="page-title">Data Management</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">

                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Select The Data Table</h3>
                            <form action="#" method="POST">
                                <div class="mb-3">
                                    <label for="data-type" class="form-label">Data Table</label>
                                    <select class="form-select" id="data-type" name="data-type">
                                        <option value="owner-property">Owner Property</option>
                                        <option value="customer-detail">Customer Detail</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Select</button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php if ($_POST['data-type'] == 'owner-property' || !isset($_POST['data-type'])): ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Owner Property</h3>
                <form action="#" method="POST">
                    <input type="hidden" name="data-type" value="owner-property">
                    <div class="mb-3">
                        <label for="owner_name" class="form-label">Owner Name</label>
                        <input type="text" class="form-control" id="owner_name" name="owner_name">
                    </div>
                    <div class="mb-3">
                        <label for="mobile_number" class="form-label">Mobile Number</label>
                        <input type="text" class="form-control" id="mobile_number" name="mobile_number">
                    </div>
                    <div class="mb-3">
                        <label for="property_location" class="form-label">Property Location</label>
                        <input type="text" class="form-control" id="property_location" name="property_location">
                    </div>
                    <div class="mb-3">
                        <label for="property_type" class="form-label">Property Type</label>
                        <input type="text" class="form-control" id="property_type" name="property_type">
                    </div>
                    <div class="mb-3">
                        <label for="price_per_sqrft" class="form-label">Price Per Sqft</label>
                        <input type="text" class="form-control" id="price_per_sqrft" name="price_per_sqrft">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <input type="text" class="form-control" id="status" name="status">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
                    <?php elseif ($_POST['data-type'] == 'customer-detail'): ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="white-box">
                                    <h3 class="box-title">Customer Detail</h3>
                                    <form action="#" method="POST">
                                        <input type="hidden" name="data-type" value="customer-detail">
                                        <div class="mb-3">
                                            <label for="customer_name" class="form-label">Customer Name</label>
                                            <input type="text" class="form-control" id="customer_name" name="customer_name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="customer_number" class="form-label">Customer Number</label>
                                            <input type="text" class="form-control" id="customer_number" name="customer_number">
                                        </div>
                                        <div class="mb-3">
                                            <label for="customer_requirement" class="form-label">Customer Requirement</label>
                                            <input type="text" class="form-control" id="customer_requirement" name="customer_requirement">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
            </div>
            <footer class="footer text-center">
                2024 © Inventory Management System brought to you by Presidency Real Estate
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