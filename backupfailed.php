<!-- Start session and bring in header, redirect if not authenticated -->
<?php session_start(); include 'header.php'; if($_SESSION['loggedin'] != 'true'){header("Location: index.php");}?>

<?php 
    // form block with back to home button
    $form_block = "<h1> Failed to backup database </h1>
    <form method=\"POST\" action=\"admin.php\">
        <div class=\"inputs\">
            <input class=\"userbtn btn btn-dark\" type=\"submit\" value=\"Back to home\"><br>
        </div>
    ";
    // Display the form block
    echo $form_block;
?>

<!-- Bring in the footer -->
<?php include 'footer.php'; ?>