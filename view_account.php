<?php
    //Include database connection
    require_once "connect.php";

    //VALIDATION HERE
    if(isset($_GET['user_id']) && (trim($_GET['user_id'])) != NULL){
        $user_id = trim($_GET['user_id']);

        $sql = "SELECT * FROM users WHERE user_id = '$user_id'";

        if($result = mysqli_query($connection, $sql)){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    //Retrieval of individual fields
                    $username = $row['username'];
                    $firstname = $row['firstname'];
                    $lastname = $row['lastname'];
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>E-Commerce Website: Read/View Accounts Record</title>

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
                        <h2>Read/View Accounts Record</h2>
                    </div>

                        <div class="form-group">
                            <label for="username">Username:</label>
                           <p><b> <?php echo $username ?> </b></p>
                        </div>
                        <div class="form-group">
                            <label for="firstname">First Name:</label>
                            <p><b> <?php echo $firstname ?> </b></p>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name:</label>
                            <p><b> <?php echo $lastname ?> </b></p>
                        </div>
                        <a href="accounts_list.php" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>