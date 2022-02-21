<!-- Start session and bring in header, redirect if not authenticated -->
<?php session_start(); include 'header.php'; if($_SESSION['loggedin'] != 'true'){header("Location: index.php");}?>

<?php 
    // form block with upload button
    $form_block = "<h1>Upload Database Backup</h1>
        <form method=\"POST\" action=\"restoredatabase.php\" enctype=\"multipart/form-data\">
            <div class='inputs'>
                <input type='file'class=\"form-control-file\" name=\"filebackup\"><br>
            </div>
            <div>
                <input type='submit' class=\"btn btn-dark\" name=\"submit\" value='Upload'>
            </div>
        </form>
    ";
    // Display the form block
    echo $form_block;
?>
<!-- Bring in the footer -->
<?php include 'footer.php';?>