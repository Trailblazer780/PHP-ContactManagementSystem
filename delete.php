<!-- Start session and bring in header, redirect if not authenticated -->
<?php session_start(); include 'header.php'; if($_SESSION['loggedin'] != 'true'){header("Location: index.php");}?>

<?php 
    // connect to the databae 
    require 'config.php';
    $table_name = "tblCustomers";
    $host=$config['DB_HOST'];
    $db_name=$config['DB_DATABASE'];
    $connection = mysqli_connect($host, $config['DB_USERNAME'], $config['DB_PASSWORD']) or die(mysqli_error($connection));
    $db = mysqli_select_db($connection, $db_name) or die(mysqli_error($connection));
    // Prepare the statment
    $stmt = $connection->prepare("SELECT * FROM $table_name WHERE id = ?");
    $stmt->bind_param("i", $id);
    $id = $_GET['id'];
    $stmt->execute();
    // set the result
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    // setup the variables
    $firstname = $row['firstName'];
    $lastname = $row['lastName'];
    $email = $row['email'];

    // display the info that is about to be deleted
    echo "
    <h1>Delete Customer:</h1>
    <h3>Name: $firstname $lastname</h3>
    <h3>Email: $email</h3>
    <h3><strong>Are you sure you want to delete this customer?</strong></h3>
    <div class='deletingbtns'>
    <form action='deletecustomer.php' method='post'>
        <input type='hidden' name='id' value='$id'>
        <input class='btn btn-danger' type='submit' name='submit' value='Delete'>
    </form>
    <div style='padding-left: 5px'>
    <a href='view_customers.php'><button class='btn btn-dark' name='cancel'>Cancel</button></a>
    </div>
    </div>
    ";

?>

<!-- Bring in the footer -->

<?php include 'footer.php'; ?>

