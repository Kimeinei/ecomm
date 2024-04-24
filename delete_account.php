<?php
    //Include database connection
    require_once "connect.php";

    if(isset($_POST['id']) && (trim($_POST['id'])) != NULL){
        $user_id = $_POST['id'];

        $sql = "DELETE FROM users WHERE user_id='$user_id'";
        if(mysqli_query($connection, $sql)){
            echo "<script class='text-center'>alert('Deleting Account Record Successfully!')</script>";
            header("refresh: 1; accounts_list.php");
        }else{
            echo "<script class='text-center'>alert('There was an error occured!')</script>";
            header("refresh: 1; delete_account.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>E-Commerce Website: Delete Accounts Record</title>

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
                        <h2>Delete Accounts Record</h2>
                    </div>

                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="alert alert-danger">
                            <p>Are you sure you want to delete this account record?</p>
                            <input type="hidden" name="id" value="<?php echo $_GET['user_id']; ?>">
                            <input type="submit" value="Yes" class="btn btn-danger">
                            <a href="accounts_list.php" class="btn btn-secondary">No</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
