<?php
    if($_SESSION['loggedin'] != 'true'){header("Location: index.php");}
    class getCustomers {
        public function getUserCusData($user){
            $table_name = "tblCustomers";
            // Require config.php for database connectivity
            require 'config.php';
            // Establishing the database connection
            $host=$config['DB_HOST'];
            $db_name=$config['DB_DATABASE'];
            $connection = mysqli_connect($host, $config['DB_USERNAME'], $config['DB_PASSWORD']) or die(mysqli_error($connection));
            $db = mysqli_select_db($connection, $db_name) or die(mysqli_error($connection));

            // Prepared statement to get the row from the database
            $stmt = $connection->prepare("SELECT * FROM $table_name WHERE salesmen = ? ORDER BY id ASC");
            $stmt->bind_param("s", $salesmen);
            $salesmen = $user;
            $stmt->execute();
    
            $result = $stmt->get_result();

            while($row = $result->fetch_assoc()){
                $title1 = $row['id']; 
                $title2 = $row['firstName']; 
                $title3 = $row['lastName'];
                $title4 = $row['email'];
                $title5 = $row['phone'];
                $title6 = $row['address'];
                $title7 = $row['city'];
                $title8 = $row['province'];
                $title9 = $row['postalCode'];
                $title10 = $row['dob'];
                $title11 = $row['salesmen'];
    
                echo "<tr> 
                <td>$title1</td>
                <td>$title2</td>
                <td>$title3</td>
                <td>$title4</td>
                <td>$title5</td>
                <td>$title6</td>
                <td>$title7</td>
                <td>$title8</td>
                <td>$title9</td>
                <td>$title10</td>
                <td>$title11</td>
                <td style='white-space: nowrap'><a href='getcustomer.php?id=$title1'><div class='editbtn'><input type='submit' class='btn btn-primary' value='Edit'></div></a><a href='delete.php?id=$title1'><input type='submit' class='btn btn-danger' value='Delete'></a></td>
                 </tr>";
            }
        }
    }

    $getUserCusData = new getCustomers;
    $getUserCusData->getUserCusData($_SESSION['username']);

?>