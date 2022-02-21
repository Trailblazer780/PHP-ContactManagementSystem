<!-- Start session and bring in header, redirect if not authenticated -->
<?php
    session_start();
    include 'header.php';
    if($_SESSION['loggedin'] != 'true'){header("Location: index.php");}
?>
    <!-- Logout button -->
    <h1 class="text text-dark" ><?php include 'logoutButton.php'; ?>Welcome <?php echo $_SESSION['username']?>! Please select an option:</h1>
    <!-- <form method="POST" action="getcustomers.php"> -->
    <!-- View customers button -->
    <form method="POST" action="view_customers.php">
        <div class="inputs">
            <input class="userbtn btn btn-dark" type="submit" value="View Customers"><br>
        </div>
    </form>
    <!-- Add customers button-->
    <form method="POST" action="add.php">
        <div class="inputs">
            <input class="userbtn btn btn-dark" type="submit" value="Add Customer"><br>
        </div>
    </form>
    <!-- View birthdays button -->
    <form method="POST" action="birthdays.php">
        <div class="inputs">
            <input class="userbtn btn btn-dark" type="submit" value="Customer Birthdays"><br>
        </div>
    </form>
    <!-- <form method="POST" action="email.php">
        <div class="inputs">
            <input type="hidden" name="salesmen" value="<?php echo $_SESSION['username']; ?>">
            <input class="userbtn btn btn-dark" type="submit" value="Email Customers"><br>
        </div>
    </form> -->
<!-- Bring in the footer -->
<?php include 'footer.php'; ?>