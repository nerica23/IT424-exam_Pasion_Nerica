<?php
    include('DB_Config.php');
?>
<?php

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLASS REGISTRATION</title>
</head>
<body>
    <form action="process_registration.php" method="POST">

        <label for="course_code">Course Code:</label>
        <select id="course_code" name="course_code" required>
        <?php
            $retrieve_All_Courses = "SELECT `CourseCode`, `CourseName` FROM `course`;";
            $result = $db_connect->query($retrieve_All_Courses);

            while ($row = $result->fetch_object()) {
                $CourseCode = $row->CourseCode;
                $CourseName = $row->CourseName;
                
                echo "<option value='$CourseCode'>$CourseCode | $CourseName</option>";
            }
        ?>
        </select><br><br>
        <label for="instructor">Instructor:</label>
        <select id="instructor" name="instructor" required>
        <?php
            $retrieve_All_Instructors = "SELECT `InstructorID`, `InstructorName` FROM `instructor`;";
            $result = $db_connect->query($retrieve_All_Instructors);

            while ($row = $result->fetch_object()) {
                $InstructorID = $row->InstructorID;
                $InstructorName = $row->InstructorName;
                
                echo "<option value='$InstructorID'>$InstructorName</option>";
            }

        ?>
        </select><br><br>

        <label for="room">Room:</label>
        <select id="room" name="room" required>
            <?php
                $retrieve_All_Rooms = "SELECT `RoomID`, `RoomName` FROM `room`;";
                $result = $db_connect->query($retrieve_All_Rooms);

                while ($row = $result->fetch_object()) {
                    $RoomID = $row->RoomID;
                    $RoomName = $row->RoomName;
                    
                    echo "<option value='$RoomID'>$RoomName</option>";
                }
            ?>
        </select><br><br>

        <label for="schedule">Schedule:</label>
        <input type="text" id="schedule" name="schedule" required><br><br>

        <input type="submit" value="Register">
    </form>
</body>
</html>
