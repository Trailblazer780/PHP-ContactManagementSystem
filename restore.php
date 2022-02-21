<!-- Start session and bring in header, redirect if not authenticated -->
<?php session_start(); include 'header.php'; if($_SESSION['loggedin'] != 'true'){header("Location: index.php");}?>

<?php 
    class Restore {

        public function restoreDatabase($file){
            // Setting up the database info and connection
            require 'config.php'; //note require vs include vs require_once
            $host=$config['DB_HOST'];
            $db_name=$config['DB_DATABASE'];
            $table_name= "tblCustomers";
            $connection = mysqli_connect($host, $config['DB_USERNAME'], $config['DB_PASSWORD']) or die(mysqli_error($connection));
            $db = mysqli_select_db($connection, $db_name) or die(mysqli_error($connection));

            // open the file 
            $handle = fopen($file, "r");
            // loop through the file line by line
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                // get the values from the line
                $id = $data[0];
                $firstname = $data[1];
                $lastname = $data[2];
                $phone = $data[3];
                $email = $data[4];
                $address = $data[5];
                $city = $data[6];
                $province = $data[7];
                $postalCode = $data[8];
                $dob = $data[9];
                $salesmen = $data[10];

                // prepare the statement
                $stmt = $connection->prepare("INSERT INTO $table_name (id, firstName, lastName, phone, email, address, city, province, postalCode, dob, salesmen) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("issssssssss", $id, $firstname, $lastname, $phone, $email, $address, $city, $province, $postalCode, $dob, $salesmen);
                $id = $id;
                $firstname = $firstname;
                $lastname = $lastname;
                $phone = $phone;
                $email = $email;
                $address = $address;
                $city = $city;
                $province = $province;
                $postalCode = $postalCode;
                $dob = $dob;
                $salesmen = $salesmen;
                $stmt->execute();
            }
            //
            header("Location: admin.php?message=success");
        }

    }
    // set target file
    $target_file = "uploads/backup.csv";
    // instantiate the class
    $restore = new Restore();
    // call the function
    $restore->restoreDatabase($target_file);

?>

<!-- Bring in the footer -->
<?php include 'footer.php';?>