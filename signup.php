<?php
session_start();
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="logo">
        <h4>e-grading</h4>
    </div>
  
    <div class="form">
        <h3>signup form</h3>
    <form action="" method="post">
        <label for="">username</label><br>
        <input type="text" name="username"required><br>


        <label for="">password</label><br>
        <input type="password" name="password" maxlength="6"><br>

        <input type="submit" value="signup" name="signup">
        <a href="index.php">login</a>
    </form>
    <?php
    if(isset($_POST['signup'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $sql="INSERT INTO `users`(`User_Id`, `UserName`, `Password`) VALUES 
        ('','$username','$password')";
        if(mysqli_query($conn,$sql)){
            echo "created successfully";
            header('location:index.php');
        }
        else{
            echo" failed to create,try again!";
        }
    }
    ?>

    </div>
</body>
</html>