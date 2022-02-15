<?php session_start(); include 'header.php'; if($_SESSION['loggedin'] != 'true'){header("Location: index.php");}?>

    <h1 class="text text-dark"><?php include 'logoutButton.php'; ?>Select a month to view customers born in that month:</h1>
    <div class="inputs">
        <a href="userpanel.php"><input class="btn btn-dark" type="submit" name="submit" value="Back"></a>
    </div>
    <form method="POST" action="view_birthdays.php">
        <div class="inputs">
            <input type="hidden" name="month" value="January"> 
            <input class="userbtn btn btn-dark" type="submit" value="January"><br>
        </div>
    </form>
    <form method="POST" action="view_birthdays.php">
        <div class="inputs">
        <input type="hidden" name="month" value="February"> 
            <input class="userbtn btn btn-dark" type="submit" value="February"><br>
        </div>
    </form>
    <form method="POST" action="view_birthdays.php">
        <div class="inputs">
        <input type="hidden" name="month" value="March"> 
            <input class="userbtn btn btn-dark" type="submit" value="March"><br>
        </div>
    </form>
    <form method="POST" action="view_birthdays.php">
        <div class="inputs">
        <input type="hidden" name="month" value="April"> 
            <input class="userbtn btn btn-dark" type="submit" value="April"><br>
        </div>
    </form>
    <form method="POST" action="view_birthdays.php">
        <div class="inputs">
        <input type="hidden" name="month" value="May"> 
            <input class="userbtn btn btn-dark" type="submit" value="May"><br>
        </div>
    </form>
    <form method="POST" action="view_birthdays.php">
        <div class="inputs">
        <input type="hidden" name="month" value="June"> 
            <input class="userbtn btn btn-dark" type="submit" value="June"><br>
        </div>
    </form>
    <form method="POST" action="view_birthdays.php">
        <div class="inputs">
        <input type="hidden" name="month" value="July"> 
            <input class="userbtn btn btn-dark" type="submit" value="July"><br>
        </div>
    </form>
    <form method="POST" action="view_birthdays.php">
        <div class="inputs">
        <input type="hidden" name="month" value="August"> 
            <input class="userbtn btn btn-dark" type="submit" value="August"><br>
        </div>
    </form>
    <form method="POST" action="view_birthdays.php">
        <div class="inputs">
        <input type="hidden" name="month" value="September">
            <input class="userbtn btn btn-dark" type="submit" value="September"><br>
        </div>
    </form>
    <form method="POST" action="view_birthdays.php">
        <div class="inputs">
        <input type="hidden" name="month" value="October">
            <input class="userbtn btn btn-dark" type="submit" value="October"><br>
        </div>
    </form>
    <form method="POST" action="view_birthdays.php">
        <div class="inputs">
        <input type="hidden" name="month" value="November">
            <input class="userbtn btn btn-dark" type="submit" value="November"><br>
        </div>
    </form>
    <form method="POST" action="view_birthdays.php">
        <div class="inputs">
            <input type="hidden" name="month" value="December">
            <input class="userbtn btn btn-dark" type="submit" value="December"><br>
        </div>
    </form>

<?php include 'footer.php'; ?>