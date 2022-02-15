<?php
    session_start();
    if($_SESSION['loggedin'] != 'true'){header("Location: index.php");}
    class Logout {

        public function userLogout() {
            if($_SESSION['loggedin'] != "true") {
                header("Location: index.php");
            }
            session_unset();
            unset($_COOKIE['PHPSESSID']);
            setcookie("PHPSESSID", "", time()-3600, "/");
            session_destroy();
            header("Location: index.php");
        }
    }

    $logout = new Logout;
    $logout->userLogout();
?>