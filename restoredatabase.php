<!-- Start session and bring in header, redirect if not authenticated -->
<?php session_start(); include 'header.php'; if($_SESSION['loggedin'] != 'true'){header("Location: index.php");}?>


<?php 
    // try again block 
    $try_again_block = "
        <div>
            <a href=\"upload.php\" ><input type='submit' class=\"btn btn-dark\" name=\"submit\" value='Try Again'></a>
        </div>
    ";
    // Restore database block
    $restore_block ="
    <div>
        <a href=\"restore.php\" ><input type='submit' class=\"btn btn-dark\" name=\"submit\" value='Restore Database'></a>
    </div>";

    echo "<h1> Uploading File </h1>";

    // Upload target
    $target_dir = "uploads/";
    // File name
    $target_file = $target_dir . basename($_FILES["filebackup"]["name"]);
    $uploadOk = 1;
    // get file extension
    $csvFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if file is csv file
    if(isset($_POST["submit"])) {
        // check if file is a csv file
        if($csvFileType != "csv") {
            echo "<h3>Sorry, only csv files are allowed.</h3>";
            // try again if not csv format
            echo $try_again_block;
            $uploadOk = 0;
        }else if ($csvFileType == "csv") {
            // rename the file
            $new_file_name = "backup.csv";
            $target_file = $target_dir . $new_file_name;
            // move file to directory
            move_uploaded_file($_FILES["filebackup"]["tmp_name"], $target_file);
            // Success message
            echo "<h3>The file ". basename( $_FILES["filebackup"]["name"]). " has been uploaded.<h3>";
            echo $restore_block;
        }
    }

?>


<!-- Bring in the footer -->
<?php include 'footer.php';?>