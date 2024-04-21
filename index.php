<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="index.css">
        <title>E-Commerce Website: Login System</title>
    </head>
<body>
    <div class="container">
        <div class="form_container">
            <h3>Login Form</h3>
            <form action="login.php" method="post">
                <!-- Display for Errors in Inputs -->
                <?php if(isset($_GET['error']) ){ ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php }?>
                <p>
                    <label for="name">Username:</label>
                    <input type="text" name="username" placeholder="Enter Username">
                </p>
                <p>
                    <label for="password">Password:</label>
                    <input type="password" name="password" placeholder="Enter Password">
                </p>
                <center>
                    <input type="submit" value="Login" name="submit">
                </center>
            </form>
        </div>
    </div>
</body>
</html>