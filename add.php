<!-- Start session and bring in header, redirect if not authenticated -->
<?php session_start(); include 'header.php'; if($_SESSION['loggedin'] != 'true'){header("Location: index.php");}?>
<!-- Logout buttons -->
<h1 class='text text-dark'><?php include 'logoutButton.php'; ?>Add Customer</h1>
<?php
    // Error messages
    $message_err = '';
    $firstName_err ='';
    $lastName_err = '';
    $email_err = '';
    $phone_err = '';
    $address_err = '';
    $city_err = '';
    $province_err = '';
    $postalCode_err = '';
    $dob_err = '';
    $error_block = '<div class="alertBanner alert alert-danger">';
    // regular expression for dob verification must be in the format of YYYY-MM-DD

    $dob_patttern = "/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/";

    $verfied = 'yes';
    // form block for user input
    $form_block= "
        <form action=\"$_SERVER[PHP_SELF]\" method=\"POST\">
        <input type=\"hidden\" name=\"op\" value=\"ds\">
            <div class=\"edit-customer-inputs form-group\">
                <label for=\"firstname\"><strong>First Name:</strong></label>
                <input type=\"text\" class=\"form-control\" name=\"firstname\">
            </div>
            <div class=\"edit-customer-inputs form-group\">
                <label for=\"lastname\"><strong>Last Name:</strong></label>
                <input type=\"text\" class=\"form-control\" name=\"lastname\">
            </div>
            <div class=\"edit-customer-inputs form-group\">
                <label for=\"email\"><strong>Email:</strong></label>
                <input type=\"text\" class=\"form-control\" name=\"email\">
            </div>
            <div class=\"edit-customer-inputs form-group\">
                <label for=\"phone\"><strong>Phone:</strong></label>
                <input type=\"text\" class=\"form-control\" name=\"phone\">
            </div>
            <div class=\"edit-customer-inputs form-group\">
                <label for=\"address\"><strong>Address:</strong></label>
                <input type=\"text\" class=\"form-control\" name=\"address\">
            </div>
            <div class=\"edit-customer-inputs form-group\">
                <label for=\"city\"><strong>City:</strong></label>
                <input type=\"text\" class=\"form-control\" name=\"city\">
            </div>
            <div class=\"edit-customer-inputs form-group\">
                <label for=\"province\"><strong>Province:</strong></label>
                <input type=\"text\" class=\"form-control\" name=\"province\">
            </div>
            <div class=\"edit-customer-inputs form-group\">
                <label for=\"postalcode\"><strong>Postal Code:</strong></label>
                <input type=\"text\" class=\"form-control\" name=\"postalcode\">
            </div>
            <div class=\"edit-customer-inputs form-group\">
                <label for=\"birthday\"><strong>Birthday: YYYY-MM-DD</strong></label>
                <input type=\"text\" class=\"form-control\" name=\"dob\">
                <label for=\"birthday\"><strong>Must be in YYYY-MM-DD Format</strong></label>
            </div>
            <div style=\"white-space: nowrap\">
            <button type=\"submit\" class=\"btn btn-dark\">Submit</button>
        </form>
        <a href=\"userpanel.php\"><div class=\"btn btn-dark\">Cancel</div></a></div>";

    // error check the input
    if (isset($_POST['op']) != 'ds') {
        echo $form_block;
    }
    else if(isset($_POST['op']) == 'ds') {
        // check first name
        if ($_POST['firstname'] == '') {
            $firstName_err = '| Please enter a first name |';
            $error_block .= "<strong> $firstName_err </strong><br>";
            $verfied = 'no';
        }
        if($_POST['lastname'] == '') {
            $lastName_err = '| Please enter a last name |';
            $error_block .= "<strong> $lastName_err </strong><br>";
            $verfied = 'no';
        }
        if($_POST['email'] == '') {
            $email_err = '| Please enter an email |';
            $error_block .= "<strong> $email_err </strong><br>";
            $verfied = 'no';
        }
        if($_POST['phone'] == '') {
            $phone_err = '| Please enter a phone number |';
            $error_block .= "<strong> $phone_err </strong><br>";
            $verfied = 'no';
        }
        if($_POST['address'] == '') {
            $address_err = '| Please enter an address |';
            $error_block .= "<strong> $address_err </strong><br>";
            $verfied = 'no';
        }
        if($_POST['city'] == '') {
            $city_err = '| Please enter a city |';
            $error_block .= "<strong> $city_err </strong><br>";
            $verfied = 'no';
        }
        if($_POST['province'] == '') {
            $province_err = '| Please enter a province |';
            $error_block .= "<strong> $province_err </strong><br>";
            $verfied = 'no';
        }
        if($_POST['postalcode'] == '') {
            $postalCode_err = '| Please enter a postal code |';
            $error_block .= "<strong> $postalCode_err </strong><br>";
            $verfied = 'no';
        }
        if(preg_match($dob_patttern, $_POST['dob']) == 0 || $_POST['dob'] == '') {
            $dob_err = '| Please enter a valid date of birth |';
            $error_block .= "<strong> $dob_err </strong><br>";
            $verfied = 'no';
        }
        if($verfied == 'no'){
            $error_block .= "</div>";
            echo $error_block;
            echo $form_block;
        }
        // if all input is valid, update the database
        if($verfied == 'yes' && preg_match($dob_patttern, $_POST['dob']) == 1) {
            header("Location: addcustomer.php?username=$_SESSION[username]&firstname=$_POST[firstname]&lastname=$_POST[lastname]&email=$_POST[email]&phone=$_POST[phone]&address=$_POST[address]&city=$_POST[city]&province=$_POST[province]&postalcode=$_POST[postalcode]&dob=$_POST[dob]");
        }
    }

?>
<!-- Bring in the footer -->
<?php include 'footer.php'; ?>