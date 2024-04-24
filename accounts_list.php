<?php
    //Include database connection
    require_once "connect.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>E-Commerce Website: Accounts List for Admin</title>

        <!-- Other CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- OTHER JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <style>
            .wrapper{
                width: 800px;
                margin: 0 auto;
            }
            .table tr td:last-child{
                width: 270px;
            }
        </style>
    </head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mt--5 mb-3 clearfix">
                        <h2>Accounts List</h2>
                        <a href="create_account.php" class="btn btn-success pull-right">Add New Account Record</a>
                    </div>

                    <?php
                        $sql = "SELECT * FROM users";
                        if($result = mysqli_query($connection, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                echo '
                                    <table class="table table-bordered table-stripped">
                                        <thead>
                                            <th>Username</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>';
                                        while($row = mysqli_fetch_array($result)){
                                            echo "
                                            <tr>
                                                <td>".$row['username']."</td>
                                                <td>".$row['firstname']."</td>
                                                <td>".$row['lastname']."</td>
                                                <td>
                                                    <a href='view_account.php?user_id=".$row['user_id']."' class='mr-3 btn btn-primary' title='View Customer Record' data-toggle='tooltip'>
                                                        View
                                                    </a>
                                                    <a href='update_account.php?user_id=".$row['user_id']."' class='mr-3 btn btn-secondary' title='Update Customer Record' data-toggle='tooltip'>
                                                        Edit
                                                    </a>
                                                    <a href='delete_account.php?user_id=".$row['user_id']."' class='mr-3 btn btn-danger' title='Delete Customer Record' data-toggle='tooltip'>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            ";
                                        }

                                        echo '</tbody>
                                    </table>
                                ';
                            }else{
                                echo '<div class="alert alert-danger">No Accounts Record Found!</div>';
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
    <!-- <script type="text/javascript">
        $(document).ready(function()){
            $('[data-toggle="tooltip"]').tooltip();
        }
    </script> -->