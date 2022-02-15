<?php session_start(); include "header.php"; if($_SESSION['loggedin'] != 'true'){header("Location: index.php");}?>


<h1 class="text text-dark"><?php include 'logoutButton.php'; ?>Send Email to All Customers</h1>

<?php

    $emailList = array();
    $table_name = "tblCustomers";
    // Require config.php for database connectivity
    require 'config.php';
    // Establishing the database connection
    $host=$config['DB_HOST'];
    $db_name=$config['DB_DATABASE'];
    $connection = mysqli_connect($host, $config['DB_USERNAME'], $config['DB_PASSWORD']) or die(mysqli_error($connection));
    $db = mysqli_select_db($connection, $db_name) or die(mysqli_error($connection));

    // Prepared statement to get the row from the database
    $stmt = $connection->prepare("SELECT * FROM $table_name WHERE salesmen = ? ORDER BY id ASC");
    $stmt->bind_param("s", $salesmen);
    $salesmen = $_SESSION['username'];
    $stmt->execute();

    $result = $stmt->get_result();

    // Loop through the results and add them to the emailList array
    while($row = $result->fetch_assoc()){
        $emailList[] = $row['email'];
    }


    // getEmailList($_SESSION['username']);

    $send = "yes";
    $message_err = '';
    $name_err = '';
    $email_err = '';
    $error_block = '<div class="alertBanner alert alert-danger">';
    $form_block = "
        <form method=\"POST\" action=\"$_SERVER[PHP_SELF]\">
            <div class=\"edit-customer-inputs form-group\">
                <strong>Your Name:</strong><br> 
                <input class=\"form-control\" type=\"text\" name=\"sender_name\" size=30>
            </div>
            <div class=\"edit-customer-inputs form-group\">
                <strong>Your E-Mail Address:</strong><br>
                <input class=\"form-control\" type=\"text\" name=\"sender_email\" size=30>
            </div>
            <div class=\"edit-customer-inputs form-group\">
                <strong>Message:</strong><br>
                <textarea class=\"form-control\" name=\"message\" cols=30 rows=5 wrap=virtual placeholder=\"Enter Email Here\"></textarea>
            </div>
            <input type=\"hidden\" name=\"op\" value=\"ds\">
            <div class=\"edit-customer-inputs form-group\">
                <input class=\"btn btn-dark\" type=\"submit\" name=\"submit\" value=\"Send Email\">
            </div>
        </form>
        <a href=\"view_customers.php\"><div class=\"btn btn-dark\">Cancel</div></a></div>";

    if (isset($_POST['op']) != "ds") {
            // they need to see the form
            echo "$form_block";
            // var_dump($_POST);
            // var_dump($emailList);
    } else if ($_POST['op'] == "ds") {
            // check value of $_POST[sender_name]
            if ($_POST['sender_name'] == "") {
                $name_err = "| Please enter your name! |";
                $error_block .= "<strong> $name_err </strong><br>";
                $send = "no";
            }
            // check value of $_POST[sender_email]
            if ($_POST['sender_email'] == "") {
                $email_err = "| Please enter your e-mail address! |";
                $error_block .= "<strong> $email_err </strong><br>";
                $send = "no";
            }
            // check value of $_POST[message]
            if ($_POST['message'] == "") {
                $message_err = "| Please enter a message! |";
                $error_block .= "<strong> $message_err </strong><br>";
                $send = "no";
            }
            if ($send != "no") {
                // it's ok to send, so build the mail
                $msg = "E-MAIL SENT FROM it.nscctruro.ca\n";
                $msg .= "Sender's Name:    $_POST[sender_name]\n";
                $msg .= "Sender's E-Mail:  $_POST[sender_email]\n";
                $msg .= "Message:          $_POST[message]\n\n";

                $subject = "Your Sales Guy Promotions!";
                $mailheaders = "From:ethanfarrell.ca 
                <webmaster@ethanfarrell.ca>\n";
                $mailheaders .= "Reply-To: $_POST[sender_email]\n";
                //send the mail
                //display confirmation to user
                echo "<p>Mail has been sent!</p>";

                // loop through and send email to each customer
                foreach ($emailList as $email) {
                    mail($email, $subject, $msg, $mailheaders);
                }
            } else if ($send == "no") {
                //print error messages
                $error_block .= "</div>";
                echo "$error_block";
                echo "$form_block";
            }
    }
?>



<?php include "footer.php"; ?>