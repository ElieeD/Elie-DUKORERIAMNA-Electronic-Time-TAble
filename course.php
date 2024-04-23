
<?php
session_start();
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>period</title>
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
    </div>
    <div class="form">
        <h3>ADD NEW COURSE</h3>
    <form action="" method="post">
        <label for="">course name</label>
        <input type="text" name="coursename"required>

        <label for="">details</label>
        <input type="text" name="details"required>

        <input type="submit" value="add course" name="addcourse">

    </form>
    <?php
    if(isset($_POST['addcourse'])){
        $coursename=$_POST['coursename'];
        $details=$_POST['details'];
        $sql="INSERT INTO `courses`(`course_id`, `coursename`, `details`) 
        VALUES ('','$coursename','$details')";
         if(mysqli_query($conn,$sql)){
            echo "new course added successfully!";
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
                        <th>coursename</th>
                        <th>details</th>
                        <th>action</th>
                    </tr>
                    <?php
                    $q="select *from courses";
                    $rs=mysqli_query($conn,$q);
                    while ($rows=mysqli_fetch_array($rs)){ ?>
                    <tr>
                            <td><?php echo $rows[0]?></td>
                            <td><?php echo $rows[1];?></td>
                            <td><?php echo $rows[2];?></td>
                            <td><a href="update_course.php?id=<?php echo $rows['course_id']?>">update</a>
                                <a href="delete_course.php?id=<?php echo $rows['course_id']?>">delete</a>
                        </td>
                            
                        </tr>
                    <?php } ?>
                </table>

    </div>
</body>
</html>