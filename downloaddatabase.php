<!-- Start session and bring in header, redirect if not authenticated -->
<?php session_start(); include 'header.php'; if($_SESSION['loggedin'] != 'true'){header("Location: index.php");}?>

<h1><?php include 'logoutButton.php'; ?>Click the button below to download the database</h1>

<?php 
    // form block with download button
    $form_block = "<form method=\"get\" action=\"backupdatabase.csv\">
        <div class=\"inputs\">
            <a href=\"admin.php\"><input class=\"userbtn btn btn-dark\" type=\"submit\" value=\"Download Backup\"></a><br>
        </div>
    </form>
    ";
    // Display the form block if no backup exists
    $no_backup = "<h3>No backup exists</h3>
    <div> 
        Would you like to create a backup?
    </div>
    <form method=\"POST\" action=\"backupdatabase.php\">
        <div class=\"inputs\">
            <input class=\"userbtn btn btn-dark\" type=\"submit\" value=\"Create Backup\"><br>
        </div>
    ";
    // Display the form block if a backup exists
    if(file_exists("backupdatabase.csv")){
        echo $form_block;
    }
    else{
        echo $no_backup;
    }

?>
<!-- Back button -->
<div style="padding-right: 5px">
        <a href="admin.php"><input class="btn btn-dark" type="submit" name="submit" value="Back"></a>
</div>
<!-- Bring in the footer -->
<?php include 'footer.php'; ?>