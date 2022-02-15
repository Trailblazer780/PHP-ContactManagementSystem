<?php
    session_start();

    if ((!$_POST['username'])) {
        header("Location: index.php");
        exit;
    }
    class Login {

        public function loginAuth($pass, $user) {
            $table_name = "tblUsers";
            // Require config.php for database connectivity
            require 'config.php';
            // Establishing the database connection
            $host=$config['DB_HOST'];
            $db_name=$config['DB_DATABASE'];
            $connection = mysqli_connect($host, $config['DB_USERNAME'], $config['DB_PASSWORD']) or die(mysqli_error($connection));
            $db = mysqli_select_db($connection, $db_name) or die(mysqli_error($connection));

            // Prepared statement to get the row from the database
            $stmt = $connection->prepare("SELECT * FROM $table_name WHERE username = ?");
            $stmt->bind_param("s", $username);
            $username = $user;
            $stmt->execute();

            // get results from the prepare statement
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            // verify password with password and password_hash
            if (password_verify($pass, $row['password'])) {
                $success = "true";
                $_SESSION['loggedin'] = "true";
                $_SESSION['username'] = $row['username'];
                if($row['username'] == "admin") {
                    header("Location: admin.php");
                }
                else {
                    header("Location: userpanel.php");
                }

            } else {
                $success = "false";
                $_SESSION['loggedin'] = "false";
                header("Location: index.php");
                exit;
            }
        }
    }

    $loginAuth = new Login;
    $loginAuth->loginAuth($_POST['password'], $_POST['username']);
?>