<?php
    session_start();
    $header_block ="
    <!DOCTYPE html>
    <html lang=\"en\">
        <head>
            <meta charset=\"utf-8\">
            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
            <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3\" crossorigin=\"anonymous\">
            <link rel=\"stylesheet\" href=\"styles.css\">
            <title>CMS</title>
        </head>
        <body>
        <div class=\"container\">";
    echo $header_block;
?>
            <form method="POST" action="login.php">
                <h1 class="text text-dark" >Contact Managment System Login:</h1>
                <div class="inputs">
                    <label for="user"><strong>Username:</strong></label>
                    <input class="form-control" style="max-width: 300px;" type="text" id="user" name="username" placeholder="Username" aria-describedby="username" maxlength="20">
                </div>
                <div class="inputs">
                    <label for="pass"><strong>Password:</strong></label>
                    <input class="form-control" style="max-width: 300px;" type="password" id="pass" name="password" placeholder="Password" aria-describedby="password">
                </div>
                <div class="inputs">
                    <input class="btn btn-dark" type="submit" value="Login">
                </div>
            </form>
<?php include 'footer.php'; ?>