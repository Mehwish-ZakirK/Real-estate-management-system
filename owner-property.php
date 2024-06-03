<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "INVENTORY";

// Establishing connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to export data to CSV
function exportCSV()
{
    global $conn;
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=owner_property_report.csv');
    $output = fopen('php://output', 'w');
    fputcsv($output, array('ID', 'Owner Name', 'Mobile Number', 'Property Location', 'Property Type', 'Price Per Sqft', 'Status'));

    $sql = "SELECT * FROM owner_property";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            fputcsv($output, $row);
        }
    }

    fclose($output);
}

// Handle CSV export if export button is clicked
if (isset($_POST['export'])) {
    exportCSV();
    exit();
}

// Retrieve page number from query parameter, default to 1 if not provided
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Number of records per page
$recordsPerPage = 5;

// Calculate the starting record for the current page
$start = ($page - 1) * $recordsPerPage;

// Fetch data from the database
$filter = isset($_GET['filter']) ? $_GET['filter'] : '';
$orderBy = '';

// Setting orderBy clause based on filter
switch ($filter) {
    case 'latest':
        $orderBy = 'ORDER BY id DESC';
        break;
    case 'oldest':
        $orderBy = 'ORDER BY id ASC';
        break;
    case 'available':
        $orderBy = "WHERE status = 'Available'";
        break;
    case 'not_available':
        $orderBy = "WHERE status = 'Not Available'";
        break;
    default:
        $orderBy = '';
}

// Fetch data with pagination
$sql = "SELECT * FROM owner_property $orderBy LIMIT $start, $recordsPerPage";
$result = $conn->query($sql);

// Calculate total number of pages
$totalPages = ceil($conn->query("SELECT COUNT(*) FROM owner_property")->fetch_row()[0] / $recordsPerPage);

session_start();
if (!isset($_SESSION['profile_name'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit();
}
$profile_name = $_SESSION['profile_name'];
?>


<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <link rel="icon" type="image/png" href="/img/favicon.png">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template" />
    <meta name="description"
        content="Ample Admin Lite is powerful and clean admin dashboard template, inspired by Bootstrap Framework" />
    <meta name="robots" content="noindex,nofollow" />
    <title>Admin - Owner Property Report</title>
    <link href="css/style.min.css" rel="stylesheet" />
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <a class="navbar-brand" href="home.php">
                        <b class="logo-icon">
                            <img src="/img/logo2.png" alt="homepage"
                                style="width: 70%; max-width: 150px; display: block; margin: 10px auto 0;" />
                        </b>
                    </a>
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- Add Home button here -->
                    <ul class="navbar-nav me-auto ms-2">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="home.php"><i class="fa fa-home"></i></a>
                        </li>
                    </ul>
                    <!-- End of Home button -->
                    <ul class="navbar-nav d-none d-md-block d-lg-none">
                        <li class="nav-item">
                            <a class="nav-toggler nav-link waves-effect waves-light text-white"
                                href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
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
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="profile.php"
                                aria-expanded="false">
                                <i class="fa fa-user" aria-hidden="true"></i><span class="hide-menu">Profile</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="owner-property.php"
                                aria-expanded="false">
                                <i class="fa fa-building" aria-hidden="true"></i><span class="hide-menu">Owner Property
                                    Report</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="customer-report.php"
                                aria-expanded="false">
                                <i class="fas fa-address-card" aria-hidden="true"></i><span class="hide-menu">Customers
                                    Report</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="page-wrapper">
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Report</h4>
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

                            <div class="filter-dropdown float-end">
                                <form method="post" style="display: inline-block;">
                                    <button type="submit" name="export" style="color:white;background-color:#0b2546;border:none;
                                    padding:5px;margin-right:16px;">Export Data</button>
                                </form>
                                <label for="filterOptions" class="filter-label">Sort : </label>
                                <select id="filterOptions" onchange="handleFilterChange(this)" class="filter-select">
                                    <option value="">Select Filter</option>
                                    <option value="latest">Latest</option>
                                    <option value="oldest">Oldest</option>
                                    <option value="available">Available</option>
                                    <option value="not_available">Not Available</option>
                                </select>
                            </div>

                            <h3 class="box-title">Owner Property Report</h3>
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">ID</th>
                                            <th class="border-top-0">Owner Name</th>
                                            <th class="border-top-0">Mobile Number</th>
                                            <th class="border-top-0">Property Location</th>
                                            <th class="border-top-0">Property Type</th>
                                            <th class="border-top-0">₹ Price Per Sqft </th>
                                            <th class="border-top-0">Status</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row["id"] . "</td>";
                                                echo "<td class='editable' data-field='owner_name' data-id='" . $row["id"] . "'>" . $row["owner_name"] . "</td>";
                                                echo "<td class='editable' data-field='mobile_number' data-id='" . $row["id"] . "'>" . $row["mobile_number"] . "</td>";
                                                echo "<td class='editable' data-field='property_location' data-id='" . $row["id"] . "'>" . $row["property_location"] . "</td>";
                                                echo "<td class='editable' data-field='property_type' data-id='" . $row["id"] . "'>" . $row["property_type"] . "</td>";
                                                echo "<td class='editable' data-field='price_per_sqrft' data-id='" . $row["id"] . "'>" . $row["price_per_sqrft"] . "</td>";

                                                // Checking status and setting color accordingly
                                                $status = $row["status"];
                                                $color = ($status == "Available") ? "green" : "red";
                                                echo "<td class='editable' data-field='status' data-id='" . $row["id"] . "' style='color: $color;'>" . $status . "</td>";

                                                echo "<td>";
                                                echo "<button class='edit-btn fas fa-wrench' data-id='" . $row["id"] . "' style='margin:6px;color:#0b2546;border:0px;background-color:white;'></button>";
                                                echo "<button class='delete-btn fas fa-trash-alt' data-id='" . $row["id"] . "' style='margin:6px;color:#f0c600;border:0px;background-color:white;'></button>";
                                                echo "</td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='8'>No records found</td></tr>";
                                        }
                                        ?>

                                    </tbody>
                                </table>
                                <button id="showFormBtn" class="fas fa-plus-circle"
                                    style='background-color: #5cbf5a;color: white;border: 2px solid white;padding: 10px; '>Add</button>

                                <!-- Form for inputting new data (initially hidden) -->
                                <br>
                                <br>
                                <div id="dataForm" style="display: none;">
                                    <form id="addRecordForm" class="form-inline">
                                        <!-- Add your form fields here -->
                                        <div class="form-group">
                                            <label>Owner Name</label>
                                            <input type="text" name="owner_name" placeholder="Enter Owner Name"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Mobile Number</label>
                                            <input type="text" name="number" placeholder="Enter Mobile Number"
                                                class="form-control" value="+91 " pattern="\+91 \d{10}" maxlength="14"
                                                required="true">
                                        </div>
                                        <div class="form-group">
                                            <label>Property Location</label>
                                            <input type="text" name="property_location"
                                                placeholder="Enter Property Location" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Property Type</label>
                                            <input type="text" name="property_type" placeholder="Enter Property Type"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Price Per Sqft</label>
                                            <input type="number" name="price_per_sqrft"
                                                placeholder="Enter Price Per Sqft" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="status" class="form-control status-select">
                                                <option value="Available" class="available">Available</option>
                                                <option value="not available" class="not-available">Not Available
                                                </option>
                                            </select>
                                        </div>

                                        <button type="submit"
                                            style='background-color:#f0c600 ;color: #0b2546;border:0px;padding:8px '>Submit</button>
                                    </form>
                                </div>
                                <div class="pagination">
                                    <?php if ($page > 1): ?>
                                        <a href="?page=<?php echo ($page - 1); ?>&filter=<?php echo $filter; ?>">
                                            << </a>
                                            <?php endif; ?>

                                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                                <?php if ($i === $page): ?>
                                                    <a href="?page=<?php echo $i; ?>&filter=<?php echo $filter; ?>"
                                                        class="current-page">
                                                        <?php echo $i; ?>
                                                    </a>
                                                <?php else: ?>
                                                    <a href="?page=<?php echo $i; ?>&filter=<?php echo $filter; ?>">
                                                        <?php echo $i; ?>
                                                    </a>
                                                <?php endif; ?>
                                            <?php endfor; ?>

                                            <?php if ($page < $totalPages): ?>
                                                <a
                                                    href="?page=<?php echo ($page + 1); ?>&filter=<?php echo $filter; ?>">>></a>
                                            <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <script>
                // Edit operation
                document.querySelectorAll('.edit-btn').forEach(item => {
                    item.addEventListener('click', event => {
                        let rowId = item.getAttribute('data-id');
                        let editableFields = document.querySelectorAll('.editable[data-id="' + rowId + '"]');
                        editableFields.forEach(field => {
                            let value = field.textContent.trim();
                            field.innerHTML = "<input type='text' class='form-control' value='" + value + "'>";
                        });
                    });
                });

                // Handle edit submission on pressing Enter key
                document.addEventListener('keypress', function (e) {
                    if (e.key === 'Enter') {
                        let editedField = document.querySelector('.editable input:focus');
                        if (editedField) {
                            let newValue = editedField.value.trim();
                            let rowId = editedField.parentElement.getAttribute('data-id');
                            let field = editedField.parentElement.getAttribute('data-field');
                            let formData = new FormData();
                            formData.append('edit_id', rowId);
                            formData.append('field', field);
                            formData.append('value', newValue);

                            fetch('edit_owner.php', {
                                method: 'POST',
                                body: formData
                            })
                                .then(response => {
                                    if (!response.ok) {
                                        throw new Error('Network response was not ok');
                                    }
                                    return response.text();
                                })
                                .then(data => {
                                    console.log(data);
                                    editedField.outerHTML = newValue;
                                })
                                .catch(error => {
                                    console.error('There was a problem with the fetch operation:', error);
                                });
                        }
                    }
                });

                // Delete operation
                document.querySelectorAll('.delete-btn').forEach(item => {
                    item.addEventListener('click', event => {
                        // Display confirmation dialog
                        if (confirm("Are you sure you want to delete this record?")) {
                            let deleteId = item.getAttribute('data-id');
                            let formData = new FormData();
                            formData.append('delete_id', deleteId);

                            fetch('delete_owner.php', {
                                method: 'POST',
                                body: formData
                            })
                                .then(response => {
                                    if (!response.ok) {
                                        throw new Error('Network response was not ok');
                                    }
                                    return response.text();
                                })
                                .then(data => {
                                    console.log(data);
                                    // Remove the deleted row from the table
                                    item.closest('tr').remove();
                                })
                                .catch(error => {
                                    console.error('There was a problem with the fetch operation:', error);
                                });
                        }
                    });
                });
            </script>

            <script>
                // Function to toggle display of the form
                document.getElementById('showFormBtn').addEventListener('click', function () {
                    var form = document.getElementById('dataForm');
                    if (form.style.display === 'none') {
                        form.style.display = 'block';
                    } else {
                        form.style.display = 'none';
                    }
                });

                // Function to handle form submission
                document.getElementById('addRecordForm').addEventListener('submit', function (event) {
                    event.preventDefault(); // Prevent default form submission

                    // Get form data
                    var formData = new FormData(this);

                    // Submit form data via fetch
                    fetch('add_owner.php', {
                        method: 'POST',
                        body: formData
                    })
                        .then(response => response.text())
                        .then(data => {
                            console.log(data); // Log server response

                            // Display pop-up message
                            alert("Record inserted successfully");

                            // Reload the page after 1 second
                            setTimeout(function () {
                                location.reload();
                            }, 1000);
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            // Display error message
                            alert("Error inserting record: " + error.message);
                        });
                });
                // Function to handle filter change
                function handleFilterChange(select) {
                    let filter = select.value;
                    if (filter !== '') {
                        // Redirect to the same page with the selected filter
                        window.location.href = '?filter=' + filter;
                    }
                }
            </script>

            </script>
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
<style>
    .filter-dropdown {
        float: right;
        margin-right: 20px;
        /* Adjust margin as needed */
    }

    .filter-label {
        color: #0b2546;
        font-weight: bold;
        margin-right: 4px;
    }

    .filter-select {
        background-color: #f0c600;
        border: 1px solid #f0c600;
        color: #0b2546;
        padding: 1px;
        font-size: 16px;
        /* Adjust font size as needed */
    }

    .pagination {
        margin-top: 20px;
        text-align: center;
        /* Center align the pagination */
        justify-content: center;
    }

    .pagination a {
        color: #fff;
        /* Change text color to white */
        background-color: #0b2546;
        /* Change background color to blue */
        padding: 6px 10px;
        text-decoration: none;
        border: 0.5px solid #0b2546;
        margin-right: 5px;
        border-radius: 6px;
        transition: background-color 0.3s ease;
        /* Add transition effect */
    }

    .pagination a:hover {
        background-color: #f0c600;
        /* Change hover background color to yellow */
        color: #0b2546;
        /* Change text color on hover */
    }

    .pagination .current-page {
        background-color: #f0c600;
        /* Change background color of current page */
        color: #0b2546;
        /* Change text color of current page */
    }
</style>

</html>
<?php
$conn->close();
?>