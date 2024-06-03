<!DOCTYPE html>
<html>
<title>Customer Enquiry Form</title>

<head>
    <link rel="icon" type="image/png" href="/img/favicon.png">
    <link href="css/style.min.css" rel="stylesheet" />
    <style>
        html,
        body {
            height: 100%
        }

        body {
            background-color: #0b2546;
            display: grid;
            place-items: center
        }

        .card {
            padding: 0px;
            border-radius: 20px;
            width: 100%;
            padding-bottom: -50px;
        }

        .c1 {
            background-color: #f0c600;
            border-radius: 20px;
        }

        a {
            margin: 0px;
            font-size: 13px;
            border-radius: 7px;
            text-decoration: none;
            color: black
        }

        a:hover {
            color: #e0726c;
            background-color: #0b2546;
        }

        .nav-link {
            padding: 1rem 1.4rem;
            margin: 0rem 0.7rem
        }

        .ac {
            font-weight: bold;
            color: #e0726c;
            font-size: 12px
        }

        input,
        button {
            width: 96%;
            background-color: white;
            border-radius: 8px;
            padding: 8px 17px;
            font-size: 13px;
            border: 1px solid #f5f0ef;
        }

        input: {
            text-decoration: none
        }

        .bt {
            background-color: #f0c600;
            border: 1px solid rgb(300, 200, 200)
        }

        form {
            margin-top: 65px;
        }

        form>* {
            margin: 10px 0px;
        }

        #forgot {
            margin: 0px -60px;
        }

        #register {
            text-align: center;
        }

        .wlcm {
            font-size: 25px;
            margin-bottom: -250px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-12 col-lg-11 col-xl-10">
                <div class="card d-flex mx-auto my-5">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 col-xs-12 c1 p-5">
                            <h1 class="wlcm" style="color:white; text-align:left;">Welcome to Presidency Real Estate
                            </h1>
                            <div class="row mb-5 m-3"> </div> <br><img src="/img/form.png"
                                style="margin-left:-50px; margin-top:200px">
                            <div class="row justify-content-center" style="margin-bottom:-100px">
                                <div class="w-75 mx-md-5 mx-1 mx-sm-2 mb-5 mt-4 px-sm-5 px-md-2 px-xl-1 px-2">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-12 col-xs-12 c2 px-5 pt-5">
                            <div class="row">
                            </div>
                            <form method="post" class="px-5 pb-5" id="customerForm">
                                <div class="d-flex">
                                    <h3 class="font-weight-bold">Customer Enquiry Form</h3>
                                </div>
                                <input type="text" name="name" placeholder="Name" required>
                                <input type="text" name="number" placeholder="Number" required>
                                <textarea name="requirement" rows="5"
                                    style="width:480px;border:1px solid #f5f0ef;border-radius:10px;"
                                    placeholder="    Requirements" required></textarea>
                                <button type="submit" name="submit"
                                    class="text-white text-weight-bold bt">Submit</button>
                                <a href="home.php"
                                    style="float: right;margin-top: 10px;background-color:white;color:#f0c600;">
                                    << Back to Home</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "INVENTORY";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form submission and database insertion
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $requirement = $_POST['requirement'];

    // Insert data into the database
    $sql = "INSERT INTO customer_detail (name, number, requirement) VALUES ('$name', '$number', '$requirement')";

    if ($conn->query($sql) === TRUE) {
        // Send email notification
        $to = "mdxarts.me@gmail.com"; // Your email address
        $subject = "New Customer Enquiry";
        $message = "Name: " . $name . "\n";
        $message .= "Number: " . $number . "\n";
        $message .= "Requirement: " . $requirement . "\n";
        $headers = "From: aribaajmal3@gmail.com"; 

        // Send email
        mail($to, $subject, $message, $headers);

        // Redirect user to home.php after submission
        echo '<script>alert("Thanks for filling the form for us, we will get back to you shortly"); window.location.href = "home.php";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
