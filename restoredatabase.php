<?php session_start(); include 'header.php'; if($_SESSION['loggedin'] != 'true'){header("Location: index.php");}?>


<?php 

    $try_again_block = "
        <div>
            <a href=\"upload.php\" ><input type='submit' class=\"btn btn-dark\" name=\"submit\" value='Try Again'></a>
        </div>
    ";
    $restore_block ="
    <div>
        <a href=\"restore.php\" ><input type='submit' class=\"btn btn-dark\" name=\"submit\" value='Restore Database'></a>
    </div>";

    echo "<h1> Uploading File </h1>";

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["filebackup"]["name"]);
    $uploadOk = 1;
    $csvFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if file is csv file
    if(isset($_POST["submit"])) {
        // check if file is a csv file
        if($csvFileType != "csv") {
            echo "<h3>Sorry, only csv files are allowed.</h3>";
            echo $try_again_block;
            $uploadOk = 0;
        }else if ($csvFileType == "csv") {
            // rename the file
            $new_file_name = "backup.csv";
            $target_file = $target_dir . $new_file_name;
            move_uploaded_file($_FILES["filebackup"]["tmp_name"], $target_file);
            echo "<h3>The file ". basename( $_FILES["filebackup"]["name"]). " has been uploaded.<h3>";
            echo $restore_block;
        }
    }

?>



<?php include 'footer.php';?>