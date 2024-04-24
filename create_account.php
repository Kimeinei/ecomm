<?php
    //Include database connection
    require_once "connect.php";

    $username = "";
    $firstname = "";
    $lastname = "";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //Validation
        $input_username = trim($_POST["username"]);

        if($input_username == NULL){
            $username_error = "Please Enter your Username";
        }else{
            $username = $input_username;
        }

        $input_firstname = trim($_POST["firstname"]);

        if($input_firstname == NULL){
            $firstname_error = "Please Enter your First Name";
        }else{
            $firstname = $input_firstname;
        }

        $input_lastname = trim($_POST["lastname"]);

        if($input_lastname == NULL){
            $lastname_error = "Please Enter your Last Name";
        }else{
            $lastname = $input_lastname;
        }

        //INSERT FUNCTION HERE
        if(empty($username_error) && empty($firstname_error) && empty($lastname_error)){
            $sql = "INSERT INTO users(username, firstname, lastname) VALUES('$username','$firstname','$lastname')";

            if(mysqli_query($connection, $sql)){
                echo "<script class='text-center'>alert('New Record Created Successfully!')</script>";
                header("refresh: 1; accounts_list.php");
            }else{
                echo "<script class='text-center'>alert('There was an error occured!')</script>";
                header("refresh: 1; create_account.php");
            }

            mysqli_close($connection);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>E-Commerce Website: Add New Account Record</title>

        <!-- Other CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- OTHER JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <style>
            .wrapper{
                width: 600px;
                margin: 0 auto;
            }
        </style>
    </head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mt--5 mb-3 clearfix">
                        <h2>Create Account Record</h2>
                    </div>

                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> " >
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" name="username" class="form-control" <?php echo (!empty($username_error) ? 'is-invalid' : '')?> value=<?php echo $username ?>>
                            <span class="invalid-feedback"><?php echo $username_error?></span>
                        </div>
                        <div class="form-group">
                            <label for="firstname">First Name:</label>
                            <input type="text" name="firstname" class="form-control" <?php echo (!empty($firstname_error) ? 'is-invalid' : '')?> value=<?php echo $firstname ?>>
                            <span class="invalid-feedback"><?php echo $firstname_error?></span>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name:</label>
                            <input type="text" name="lastname" class="form-control" <?php echo (!empty($lastname_error) ? 'is-invalid' : '')?> value=<?php echo $lastname ?>>
                            <span class="invalid-feedback"><?php echo $lastname_error?></span>
                        </div>

                        <input type="submit" value="Submit" class="btn btn-primary">
                        <a href="accounts_list.php" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>