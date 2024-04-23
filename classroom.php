
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
        <h4>E-TIMETABLE</h4>
    </div>
    <div class="nav">
        <ul>
            <a href="index.php">USERS</a>
            <a href="course.php">COURSES</a>
            <a href="period.php">PERIODS</a>
            <a href="classroom.php" >CLASSES</a>
            <a href="timetable.php">TIME TABLE</a>
            <a href="report.php">REPORT</a> 
            <a href="#">LOG OUT</a>
        </ul>
    </div>
    <div class="form">
        <h3>ADD NEW CLASS</h3>
    <form action="" method="post">
        <label for="">class name</label>
        <input type="text" name="classname"required>

        <label for="">details</label>
        <input type="text" name="details"required>

        <input type="submit" value="add class" name="addclass">

    </form>
    <?php
    if(isset($_POST['addclass'])){
        $classname=$_POST['classname'];
        $details=$_POST['details'];
        $sql="INSERT INTO `classroom`(`class_id`, `class_name`, `details`) 
        VALUES ('','$classname','$details')";
         if(mysqli_query($conn,$sql)){
            echo "new class added successfully!";
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
                        <th>classname</th>
                        <th>details</th>
                        <th>action</th>
                    </tr>
                    <?php
                    $q="select *from classroom";
                    $rs=mysqli_query($conn,$q);
                    while ($rows=mysqli_fetch_array($rs)){ ?>
                    <tr>
                            <td><?php echo $rows[0]?></td>
                            <td><?php echo $rows[1];?></td>
                            <td><?php echo $rows[2];?></td>
                            <td><a href="update_classroom.php?id=<?php echo $rows['class_id']?>">update</a>
                                <a href="delete_classroom.php?id=<?php echo $rows['class_id']?>">delete</a>
                        </td>
                            
                        </tr>
                    <?php } ?>
                </table>

    </div>
</body>
</html>