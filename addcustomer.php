<?php session_start(); if($_SESSION['loggedin'] != 'true'){header("Location: index.php");}?>

<?php 
    class AddCustomer {

        public function add($salesmen, $firstname, $lastname, $email, $phone, $address, $city, $province, $postalCode, $dob){
            require 'config.php';
            $table_name = "tblCustomers";
            $host=$config['DB_HOST'];
            $db_name=$config['DB_DATABASE'];
            $connection = mysqli_connect($host, $config['DB_USERNAME'], $config['DB_PASSWORD']) or die(mysqli_error($connection));
            $db = mysqli_select_db($connection, $db_name) or die(mysqli_error($connection));
        
            $stmt = $connection->prepare("INSERT INTO $table_name (firstName, lastName, email, phone, address, city, province, postalCode, dob, salesmen) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssssss", $firstname, $lastname, $email, $phone, $address, $city, $province, $postalCode, $dob, $salesmen);
            $firstname = $firstname;
            $lastname = $lastname;
            $email = $email;
            $phone = $phone;
            $address = $address;
            $city = $city;
            $province = $province;
            $postalCode = $postalCode;
            $dob = $dob;
            $salesmen = $salesmen;
            $stmt->execute();
            $stmt->close();
            // unset($_SESSION['cusInfo']);
            header("Location: view_customers.php");
        }
    }

    $addCustomer = new AddCustomer;
    // if($_POST['firstname']=="" || $_POST['lastname']=="" || $_POST['email']=="" || $_POST['phone']=="" || $_POST['address']=="" || $_POST['city']=="" || $_POST['province']=="" || $_POST['postalCode']=="" || $_POST['dob']==""){
    //     header("Location: add.php");
    // }
    // else{
    // }
    $addCustomer->add($_GET['username'], $_GET['firstname'], $_GET['lastname'], $_GET['email'], $_GET['phone'], $_GET['address'], $_GET['city'], $_GET['province'], $_GET['postalcode'], $_GET['dob']);
    
    var_dump($_POST);
?>