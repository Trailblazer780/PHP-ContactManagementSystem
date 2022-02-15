<?php session_start(); include 'header.php'; if($_SESSION['loggedin'] != 'true'){header("Location: index.php");}?>

<?php 

    $form_block = "<h1> Failed to backup database </h1>
    <form method=\"POST\" action=\"admin.php\">
        <div class=\"inputs\">
            <input class=\"userbtn btn btn-dark\" type=\"submit\" value=\"Back to home\"><br>
        </div>
    ";

    echo $form_block;
?>


<?php include 'footer.php'; ?>