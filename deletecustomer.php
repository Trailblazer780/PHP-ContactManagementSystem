<?php session_start(); if($_SESSION['loggedin'] != 'true'){header("Location: index.php");} ?>

<?php

    class Delete {

        public function deleteCustomer($userID){
            $table_name = "tblCustomers";
            // Require config.php for database connectivity
            require 'config.php';
            // Establishing the database connection
            $host=$config['DB_HOST'];
            $db_name=$config['DB_DATABASE'];
            $connection = mysqli_connect($host, $config['DB_USERNAME'], $config['DB_PASSWORD']) or die(mysqli_error($connection));
            $db = mysqli_select_db($connection, $db_name) or die(mysqli_error($connection));

            // Prepared statement to delete the row from the database
            $stmt = $connection->prepare("DELETE FROM $table_name WHERE id = ?");
            $stmt->bind_param("i", $userID);
            $userID = $userID;
            $stmt->execute();

            header("Location: view_customers.php");
        }
    }

    $obj = new Delete;
    $obj->deleteCustomer($_POST['id']);

?>