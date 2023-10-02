<?php
    include('connection.php');

    $Courseid = "";
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
        <input type="text" id="course_code" name="course_code" required><br><br>

        <label for="instructor">Instructor:</label>
        <input type="text" id="instructor" name="instructor" required><br><br>

        <label for="room">Room:</label>
        <input type="text" id="room" name="room" required><br><br>

        <label for="schedule">Schedule:</label>
        <input type="text" id="schedule" name="schedule" required><br><br>

        <label for="course_id">Select a Course:</label>
        <select id="course_id" name="course_id">
            <?php
                $retrieve_All_Courses = "SELECT `CourseID`, `CourseCode`, `CourseName` FROM `course`;";
                $result = $conn->query($retrieve_All_Courses);

                while ($row = $result->fetch_assoc()) {
                    $CourseID = $row['CourseID'];
                    $CourseCode = $row['CourseCode'];
                    $CourseName = $row['CourseName'];
                    
                    echo "<option value='$CourseID'>$CourseCode | $CourseName</option>";
                }
            ?>
        </select><br><br>

       
        <label for="instructor_id">Select an Instructor:</label>
        <select id="instructor_id" name="instructor_id">
            <?php
                $retrieve_All_Instructors = "SELECT `InstructorID`, `InstructorName` FROM `instructor`;";
                $result = $conn->query($retrieve_All_Instructors);

                while ($row = $result->fetch_assoc()) {
                    $InstructorID = $row['InstructorID'];
                    $InstructorName = $row['InstructorName'];
                    
                    echo "<option value='$InstructorID'>$InstructorName</option>";
                }
            ?>
        </select><br><br>

       
        <label for="room_id">Select a Room:</label>
        <select id="room_id" name="room_id">
            <?php
                $retrieve_All_Rooms = "SELECT `RoomID`, `RoomName` FROM `room`;";
                $result = $conn->query($retrieve_All_Rooms);

                while ($row = $result->fetch_assoc()) {
                    $RoomID = $row['RoomID'];
                    $RoomName = $row['RoomName'];
                    
                    echo "<option value='$RoomID'>$RoomName</option>";
                }
            ?>
        </select><br><br>

        <input type="submit" value="Register">
    </form>

    <?php
       
        $conn->close();
    ?>
</body>
</html>
