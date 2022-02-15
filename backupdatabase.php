<?php session_start(); include 'header.php';if($_SESSION['loggedin'] != 'true'){header("Location: index.php");} ?>

<?php 

    class backupData {
        public function backupdatabase(){
            $table_name = "tblCustomers";
            // Require config.php for database connectivity
            require 'config.php';
            // Establishing the database connection
            $host=$config['DB_HOST'];
            $db_name=$config['DB_DATABASE'];
            $connection = mysqli_connect($host, $config['DB_USERNAME'], $config['DB_PASSWORD']) or die(mysqli_error($connection));
            $db = mysqli_select_db($connection, $db_name) or die(mysqli_error($connection));
        
            // Prepared statement to get the row from the database
            $stmt = $connection->prepare("SELECT * FROM $table_name ORDER BY id ASC");
            $stmt->execute();
        
            $result = $stmt->get_result();
            // backup the result to a csv file
            $fp = fopen('backupdatabase.csv', 'w');
            while($row = $result->fetch_assoc()) {
                fputcsv($fp, $row);
            }
            fclose($fp);
            if(file_exists('backupdatabase.csv')){
                header("Location: downloaddatabase.php");
            }
            else{
                header("Location: backupfailed.php");
            }
        }
    }
    $backup = new backupData;
    $backup->backupdatabase();
?>

<?php include 'footer.php'; ?>

