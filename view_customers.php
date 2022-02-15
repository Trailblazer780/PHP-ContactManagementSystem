<?php session_start(); include "header.php"; if($_SESSION['loggedin'] != 'true'){header("Location: index.php");} ?>
<h1><?php include 'logoutButton.php'; ?>All Customers for <?php echo $_SESSION['username']?></h1>
<div style="padding-bottom: 5px; display: flex; justify-content: center">
    <div style="padding-right: 5px">
        <a href="userpanel.php"><input class="btn btn-dark" type="submit" name="submit" value="Back"></a>
    </div>
    <form method="POST" action="email.php">
        <input type="hidden" name="salesmen" value="<?php echo $_SESSION['username']; ?>">
        <input class="btn btn-dark" type="submit" name="submit" value="Send Email to All">
    </form>
</div>

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
        <th>Edit/Delete</th>
    </tr>


<?php include "getcustomers.php"; ?>

</table>

<?php include "footer.php"; ?>