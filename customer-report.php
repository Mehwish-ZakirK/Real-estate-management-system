<?php
session_start();
if (!isset($_SESSION['profile_name'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit();
}

$profile_name = $_SESSION['profile_name'];
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
    header('Content-Disposition: attachment; filename=customer_detail_report.csv');
    $output = fopen('php://output', 'w');
    fputcsv($output, array('ID', 'Name', 'Number', 'Requirement'));

    $sql = "SELECT * FROM customer_detail";
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

// Pagination variables
$records_per_page = 5;
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($current_page - 1) * $records_per_page;

// Retrieving data from the database
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
    default:
        $orderBy = '';
}

$sql = "SELECT * FROM customer_detail $orderBy LIMIT $offset, $records_per_page";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template" />
    <meta name="description"
        content="Ample Admin Lite is powerful and clean admin dashboard template, inspired by Bootstrap Framework" />
    <meta name="robots" content="noindex,nofollow" />
    <title>Admin - Customer Details</title>
    <link href="css/style.min.css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="/img/favicon.png">
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
                                </select>
                            </div>
                            <h3 class="box-title">Customer Report</h3>
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">ID</th>
                                            <th class="border-top-0">Name</th>
                                            <th class="border-top-0">Mobile Number</th>
                                            <th class="border-top-0">Requirement</th>
                                            <th class="border-top-0">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row["id"] . "</td>";
                                                echo "<td class='editable' data-field='name' data-id='" . $row["id"] . "'>" . $row["name"] . "</td>";
                                                echo "<td class='editable' data-field='number' data-id='" . $row["id"] . "'>" . $row["number"] . "</td>";
                                                echo "<td class='editable' data-field='requirement' data-id='" . $row["id"] . "'>" . $row["requirement"] . "</td>";
                                                echo "<td>";
                                                echo "<button class='edit-btn fas fa-wrench' data-id='" . $row["id"] . "' style='margin:6px;color:#0b2546;border:0px;background-color:white;'></button>";
                                                echo "<button class='delete-btn fas fa-trash-alt' data-id='" . $row["id"] . "' style='margin:6px;color:#f0c600;border:0px;background-color:white;'></button>";
                                                echo "</td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='5'>No records found</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <button id="showFormBtn" class="fas fa-plus-circle"
                                    style='background-color: #5cbf5a;color: white;border: 2px solid white;padding: 10px; '>
                                    Add</button>

                                <!-- Form for inputting new data (initially hidden) -->
                                <br>
                                <br>
                                <div id="dataForm" style="display: none;">
                                    <form id="addRecordForm" class="form-inline">
                                        <!-- Add your form fields here -->
                                        <div class="form-group">
                                            <label>Customer Name</label>
                                            <input type="text" name="name" placeholder="Enter Name" class="form-control"
                                                required="true">
                                        </div>
                                        <div class="form-group">
                                            <label>Mobile Number</label>
                                            <input type="text" name="number" placeholder="Enter Mobile Number"
                                                class="form-control" value="+91 " pattern="\+91 \d{10}" maxlength="14"
                                                required="true">
                                        </div>
                                        <div class="form-group">
                                            <label>Requirements</label>
                                            <input type="text" name="requirement"
                                                placeholder=" Enter Requirements - (Property Type,Preferred Location,Max Price,etc..)"
                                                class="form-control" required="true">
                                        </div>
                                        <button type="submit"
                                            style='background-color:#f0c600 ;color: #0b2546;border:0px;padding:8px '>Submit
                                            </buetton>
                                    </form>
                                </div>
                                <div class="pagination">
                                    <?php
                                    // Count total number of records
                                    $sql_count = "SELECT COUNT(*) AS total_records FROM customer_detail";
                                    $result_count = $conn->query($sql_count);
                                    $row_count = $result_count->fetch_assoc();
                                    $total_records = $row_count['total_records'];

                                    // Calculate total pages
                                    $total_pages = ceil($total_records / $records_per_page);

                                    // Previous page link
                                    if ($current_page > 1) {
                                        echo '<a href="?page=' . ($current_page - 1) . '"> << </a>';
                                    }

                                    // Page links
                                    for ($i = 1; $i <= $total_pages; $i++) {
                                        if ($i == $current_page) {
                                            echo '<a href="?page=' . $i . '" class="current-page">' . $i . '</a>'; // Add class for current page
                                        } else {
                                            echo '<a href="?page=' . $i . '">' . $i . '</a>'; // Other pages
                                        }
                                    }

                                    // Next page link
                                    if ($current_page < $total_pages) {
                                        echo '<a href="?page=' . ($current_page + 1) . '"> >> </a>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
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

                            fetch('edit_customer.php', {
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

                document.querySelectorAll('.delete-btn').forEach(item => {
                    item.addEventListener('click', event => {
                        // Display confirmation dialog
                        if (confirm("Are you sure you want to delete this record?")) {
                            let deleteId = item.getAttribute('data-id');
                            let formData = new FormData();
                            formData.append('delete_id', deleteId);

                            fetch('delete_customer.php', {
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
                    fetch('input_customer.php', {
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
                function handleFilterChange(select) {
                    let filter = select.value;
                    if (filter !== '') {
                        // Redirect to the same page with the selected filter
                        window.location.href = '?filter=' + filter;
                    }
                }
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

    .pagination a.current-page {
        background-color: #f0c600;
        /* Change background color of current page */
        color: #0b2546;
        /* Change text color of current page */
    }

    .pagination span {
        color: #fff;
        /* Change text color to white */
        background-color: #0b2546;
        /* Change background color to blue */
        padding: 6px 10px;
        text-decoration: none;
        border: 0.5px solid #0b2546;
        margin-right: 5px;
        border-radius: 6px;
    }

    .pagination span:hover {
        background-color: #f0c600;
        /* Change hover background color to yellow */
        color: #0b2546;
        /* Change text color on hover */
    }
</style>

</html>