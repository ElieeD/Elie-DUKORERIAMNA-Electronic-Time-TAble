
<?php
session_start();
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <link rel="stylesheet" href="style.css">
</head> 
<body>
    <div class="logo">
        <h4>e-grading</h4>
    </div>
    <div class="nav">
        <ul>
        <a href="index.php">USERS</a>
            <a href="course.php">COURSES</a>
            <a href="period.php">PERIODS</a>
            <a href="classroom.php" >CLASSES</a>
            <a href="timetable.php">TIME TABLE</a>
            <a href="report.php">REPORT</a> 
            <a href="logout.php">LOG OUT</a>
        </ul>
    </div>
    <div class="form">
        <h3>ADD NEW USER</h3>
    <form action="" method="post">
        <label for="">username</label>
        <input type="text" name="username"required>

        <label for="">telephone</label>
        <input type="number" name="tel"required>
        <label for="">email</label>
        <input type="email" name="email"required>

        <label for="">address</label>
        <input type="text" name="address"required>


        <input type="submit" value="add user" name="adduser">

    </form>
    <?php
    if(isset($_POST['adduser'])){
        $username=$_POST['username'];
        $tel=$_POST['tel'];
        $email=$_POST['email'];
        $address=$_POST['address'];
        
        $sql="INSERT INTO `users`(`user_id`, `username`, `tel`, `email`, `address`) 
        VALUES ('','$username','$tel','$email','$address')";
         if(mysqli_query($conn,$sql)){
            echo "new user added successfully!";
         }
         else{
            echo" not added,try again!";
         }
    }
    ?>
    </div>
    <div class="table">
    <table>
                    <tr>
                        <th>#</th>
                        <th>username</th>
                        <th>telephone</th>
                        <th>email</th>
                        <th>address</th>
                        <th>action</th>
                    </tr>
                    <?php
                    $q="select *from users";
                    $rs=mysqli_query($conn,$q);
                    while ($rows=mysqli_fetch_assoc($rs)){ ?>
                    <tr>
                            <td><?php echo $rows['user_id']?></td>
                            <td><?php echo $rows['username'];?></td>
                            <td><?php echo $rows['tel'];?></td>
                            <td><?php echo $rows['email'];?></td>
                            <td><?php echo $rows['address'];?></td>
                            
                            
                            <td><a href="update_user.php?id=<?php echo $rows['user_id']?>">update</a>
                                <a href="delete_user.php?id=<?php echo $rows['user_id']?>">delete</a>
                        </td>
                            
                        </tr>
                    <?php } ?>
                </table>

    </div>
</html>