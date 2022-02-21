<!-- Start session and bring in header, redirect if not authenticated -->
<?php session_start(); include 'header.php'; if($_SESSION['loggedin'] != 'true'){header("Location: index.php");}?>
<!-- Logout Button -->
<h1><?php include 'logoutButton.php'; ?>Customers with birthdays in <?php echo $_POST['month']?></h1>
<!-- Back Button -->
<div class="inputs">
    <a href="birthdays.php"><input class="btn btn-dark" type="submit" name="submit" value="Back"></a>
</div>
<!-- Table to display birthdays -->
<table class="table table-striped table-hover table-dark">
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>City</th>
        <th>Province</th>
        <th>Postal Code</th>
        <th>Birthday</th>
        <th>Salesmen</th>
    </tr>

<?php 
    // Get the customers with birthdays in the selected month
    function getCusBirthdays($month){
        $table_name = "tblCustomers";
        // Require config.php for database connectivity
        require 'config.php';
        // Establishing the database connection
        $host=$config['DB_HOST'];
        $db_name=$config['DB_DATABASE'];
        $connection = mysqli_connect($host, $config['DB_USERNAME'], $config['DB_PASSWORD']) or die(mysqli_error($connection));
        $db = mysqli_select_db($connection, $db_name) or die(mysqli_error($connection));

        // Prepared statement to get the row from the database
        $stmt = $connection->prepare("SELECT * FROM $table_name WHERE monthname(dob) = ?");
        $stmt->bind_param("s", $month);
        $month = $month;
        $stmt->execute();

        $result = $stmt->get_result();
        // set the resulting array to associative
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
            </tr>";
        }
    }
    // Call function and give it the month to check birthdays with 
    getCusBirthdays($_POST['month']);

?>



<!-- <?php

    include "getbirthdays.php";

?> -->
<!-- Bring in the footer -->
<?php include 'footer.php'; ?>