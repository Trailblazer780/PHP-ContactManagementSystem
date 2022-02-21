<!-- Start session and bring in header, redirect if not authenticated -->
<?php session_start(); if($_SESSION['loggedin'] != 'true'){header("Location: index.php");}?>

<?php 

    class Customer {
        // get customer info with id
        public function getCus(){
            require 'config.php';
            $table_name = "tblCustomers";
            $host=$config['DB_HOST'];
            $db_name=$config['DB_DATABASE'];
            $connection = mysqli_connect($host, $config['DB_USERNAME'], $config['DB_PASSWORD']) or die(mysqli_error($connection));
            $db = mysqli_select_db($connection, $db_name) or die(mysqli_error($connection));
            
            // prepare the connection
            $stmt = $connection->prepare("SELECT * FROM $table_name WHERE id = ?");
            $stmt->bind_param("i", $id);
            $id = $_GET['id'];
            $stmt->execute();
            
            // set the result
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            
            // setup the variables
            $userID = $row['id'];
            $firstname = $row['firstName'];
            $lastname = $row['lastName'];
            $email = $row['email'];
            $phone = $row['phone'];
            $address = $row['address'];
            $city = $row['city'];
            $province = $row['province'];
            $postalCode = $row['postalCode'];
            $dob = $row['dob'];
            // set the array
            $cusInfo = array($userID, $firstname, $lastname, $email, $phone, $address, $city, $province, $postalCode, $dob);
            // store in session variable for use
            $_SESSION['cusInfo'] = $cusInfo;
            // redirect to edit page
            header("Location: edit.php");

        }
    }
    // instantiate the class
    $customer = new Customer; 
    // call the function
    $customer->getCus();
?>
