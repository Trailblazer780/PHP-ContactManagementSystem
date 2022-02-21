<?php
    // strart session and check if user is logged in
    session_start();
    if($_SESSION['loggedin'] != 'true'){header("Location: index.php");}

    class Logout {

        public function userLogout() {
            if($_SESSION['loggedin'] != "true") {
                header("Location: index.php");
            }
            // unset all cookies and sesion variables
            session_unset();
            unset($_COOKIE['PHPSESSID']);
            setcookie("PHPSESSID", "", time()-3600, "/");
            session_destroy();
            // return to login page
            header("Location: index.php");
        }
    }
    // instantiate the class
    $logout = new Logout;
    // call the function
    $logout->userLogout();
?>
<!-- take out end script tags where no html is -->