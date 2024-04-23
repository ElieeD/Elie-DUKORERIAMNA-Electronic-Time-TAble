
<?php
session_start();
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>timetable</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="logo">
    <h4>ELECTRONIC  -  TIMETABLE</h4>
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
        <h3>ADD timetable</h3>
    <form action="" method="post">
        <select name="user_id" id="">
            <option value="">select a user</option>
            <?php
            $fkey="SELECT * FROM `users`";
            $result=mysqli_query($conn,$fkey);
            while($row=mysqli_fetch_array($result)){?>
            <option value="<?php echo $row[0]?>">
            <?php echo $row[1]?></option>
            <?php } ?>
            
        </select>
        <select name="course_id">
            <option value="">select course</option>
            <?php 
            $fkey="SELECT * FROM `courses` ";
            $result=mysqli_query($conn,$fkey);
            while($row=mysqli_fetch_array($result)){?>
            <option value="<?php echo $row[0]?>">
            <?php echo $row[1]?></option>
            <?php } ?>
            
        </select>
        <select name="class_id" id="">
            <option value="">select classroom</option>
            <?php 
            $fkey="SELECT * FROM `classroom`";
            $result=mysqli_query($conn,$fkey);
            while($row=mysqli_fetch_array($result)){?>
            <option value="<?php echo $row[0]?>">
            <?php echo $row[1]?></option>
            <?php } ?>
            
        </select>
        <select name="period_id" id="">
            <option value="">select period</option>
            <?php
            $fkey="SELECT * FROM `periods`";
            $result=mysqli_query($conn,$fkey);
            while($row=mysqli_fetch_array($result)){?>
            <option value="<?php echo $row[0]?>">
            <?php echo $row[1]?>
            <?php echo $row[2]?>
            <?php echo $row[3]?>
        </option>
            <?php } ?>
        </select>

        <input type="submit" value="create timetable" name="addtimetable">

    </form>
    <?php
   if(isset($_POST['addtimetable'])){
    $userid = $_POST['user_id'];
    $courseid= $_POST['course_id'];
    $classid = $_POST['class_id'];
    $periodid = $_POST['period_id'];
    $sql = "INSERT INTO `timetable`(`timetable_id`, `course_id`, `period_id`, `class_id`, `user_id`) 
    VALUES ('','$courseid','$periodid','$classid','$userid')";
    
    if(mysqli_query($conn, $sql)){
        echo "New timetable created successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
    ?>
    </div>
    <div class="table">
    <table>
                    <tr>
                        <th>No</th>
                        <th>user</th>
                        <th>course</th>
                        <th>classroom</th>
                        <th>period</th>
                        
                        
                    </tr>
                    <?php
                    $q="SELECT timetable.timetable_id, users.username,
                    courses.coursename,classroom.class_name,periods.start,periods.end 
                    FROM timetable 
                    INNER JOIN users ON timetable.user_id=users.user_id 
                    INNER JOIN courses ON timetable.course_id=courses.course_id 
                    INNER JOIN classroom ON timetable.class_id=classroom.class_id 
                    INNER JOIN periods ON timetable.period_id=periods.period_id;";
                    $id=1;
                    $rs=mysqli_query($conn,$q);
                    while ($rows=mysqli_fetch_array($rs)){ ?>
                    <tr>
                            <td><?php echo $id++;?></td>
                            <td><?php echo $rows['username'];?></td>
                            <td><?php echo $rows['coursename'];?></td>
                            <?php
                            if($rows['coursename']!='BREAK')
                            {
                             echo '<td>'.$rows['class_name'].'</td>';
                        }
                        if($rows['coursename']=='BREAK')
                            {   
                                echo '<td>BREAK</td>';
                        }
                        ?>
                            <td><?php echo $rows['start'].' - '. $rows['end'];?></td>
                            
                           
                            
                        </tr>
                    <?php } ?>
                </table>

    </div>
</body>
</html>