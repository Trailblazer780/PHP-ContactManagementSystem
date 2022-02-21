<!-- Start session and bring in header, redirect if not authenticated -->
<?php session_start(); include 'header.php'; if($_SESSION['loggedin'] != 'true'){header("Location: index.php");}?>

    <h1 class="text text-dark" ><?php include 'logoutButton.php'; ?> Welcome <?php echo $_SESSION['username']?>! Please select an option:</h1>
    <!-- <form method="POST" action="getcustomers.php"> -->
        <!-- Backup database button -->
    <form method="POST" action="backupdatabase.php">
        <div class="inputs">
            <input class="userbtn btn btn-dark" type="submit" value="Backup Database"><br>
        </div>
    </form>
    <!-- Download database button -->
    <form method="POST" action="downloaddatabase.php">
        <div class="inputs">
            <input class="userbtn btn btn-dark" type="submit" value="Download Database"><br>
        </div>
    </form>
    <!-- Restore the database button -->
    <form method="POST" action="upload.php">
        <div class="inputs">
            <input class="userbtn btn btn-dark" type="submit" value="Restore Database"><br>
        </div>
    </form>

<!-- Bring in the footer -->

<?php include 'footer.php'; ?>