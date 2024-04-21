<?php
    //start of session here
    session_start();
    //check the connection of database
    include "connect.php";

    //LOGIN CODES HERE
    if(isset($_POST['username']) && isset($_POST['password']))
    {
        //VALIDATION of DATA INPUTS
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $username = validate($_POST['username']);
        $password = validate($_POST['password']);

        //check if its empty or not
        if(empty($username) && empty($password)){
            header("location:index.php?error=Username and Password are Required");
            exit();
        }else if(empty($username))
        {
            header("location:index.php?error=Username is Required");
            exit();
        }else if(empty($password))
        {
            header("location:index.php?error=Password is Required");
            exit();
        }else
        {
            $sql = "SELECT * from users WHERE username = '$username' and password='$password'";

            $result = mysqli_query($connection, $sql);
            {
                if(mysqli_num_rows($result) === 1)
                {
                    $row = mysqli_fetch_assoc($result);
                    
                    if($row['username'] === $username && $row['password'] === $password)
                    {
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['id'] = $row['id'];
                        header("location: home.php");
                        exit();
                    }else
                    {
                        header("location:index.php?error=Incorrect Username or Password!");
                        exit();
                    }
                }else
                {
                    header("location:index.php?error=Incorrect Username or Password!");
                    exit();
                }
            }
        }
    }
    else
    {
        header("location:index.php");
        exit();
    }
?>