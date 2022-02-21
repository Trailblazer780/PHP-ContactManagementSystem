<!-- Start session and bring in header, redirect if not authenticated -->
<?php session_start(); if($_SESSION['loggedin'] != 'true'){header("Location: index.php");}?>


<?php 
    class AlterCustomer {
        // function to alter the customer
        public function alter($userID, $firstname, $lastname, $email, $phone, $address, $city, $province, $postalCode, $dob){
            // connect to the database
            require 'config.php';
            $table_name = "tblCustomers";
            $host=$config['DB_HOST'];
            $db_name=$config['DB_DATABASE'];
            $connection = mysqli_connect($host, $config['DB_USERNAME'], $config['DB_PASSWORD']) or die(mysqli_error($connection));
            $db = mysqli_select_db($connection, $db_name) or die(mysqli_error($connection));
            // Prepare the statement
            $stmt = $connection->prepare("UPDATE $table_name SET firstName= ?, lastName=?, email=?, phone=?, address=?, city=?, province=?, postalCode=?, dob=? WHERE id = ?");
            $stmt->bind_param("sssssssssi", $firstname, $lastname, $email, $phone, $address, $city, $province, $postalCode, $dob, $userID);
            $firstname = $firstname;
            $lastname = $lastname;
            $email = $email;
            $phone = $phone;
            $address = $address;
            $city = $city;
            $province = $province;
            $postalCode = $postalCode;
            $dob = $dob;
            $userID = $userID;
            $stmt->execute();
            // redirect when done
            unset($_SESSION['cusInfo']);
            header("Location: view_customers.php");
        }
    }
    // instantiate the class
    $alterCustomer = new AlterCustomer;
    // call the function
    $alterCustomer->alter($_GET['userID'], $_GET['firstname'], $_GET['lastname'], $_GET['email'], $_GET['phone'], $_GET['address'], $_GET['city'], $_GET['province'], $_GET['postalcode'], $_GET['dob']);
    // var_dump($_GET);
?>