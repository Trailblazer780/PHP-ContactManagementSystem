<?php
    if($_SESSION['loggedin'] != 'true'){header("Location: index.php");}
    class getBirthdays {

        public function getCusBirthdays(){
            $table_name = "tblCustomers";
            // Require config.php for database connectivity
            require 'config.php';
            // Establishing the database connection
            $host=$config['DB_HOST'];
            $db_name=$config['DB_DATABASE'];
            $connection = mysqli_connect($host, $config['DB_USERNAME'], $config['DB_PASSWORD']) or die(mysqli_error($connection));
            $db = mysqli_select_db($connection, $db_name) or die(mysqli_error($connection));

            // Prepared statement to get the row from the database
            $stmt = $connection->prepare("SELECT * FROM $table_name WHERE monthname(dob) = 'January'");
            // $stmt->bind_param("s", $salesmen);
            // $salesmen = $user;
            $stmt->execute();
            
            // set the resule
            $result = $stmt->get_result();
            // loop through result
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
                // display table row for each customer
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
                 </tr>";
            }
        }
    }
    // instantiate the class
    $getbday = new getBirthdays;
    // call the function
    $getbday->getCusBirthdays();

?>