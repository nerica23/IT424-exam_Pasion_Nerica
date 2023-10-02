<?php
include('DB_Config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the 'course_code' POST parameter is set
    if (isset($_POST['course_code'])) {
        $courseCode = $_POST['course_code'];
        // Use a prepared statement to prevent SQL injection
        $retrieve_Classes = "SELECT c.CourseCode, c.CourseName, i.InstructorName, r.RoomName, cl.Schedule 
                             FROM class cl
                             INNER JOIN course c ON cl.CourseID = c.CourseID
                             INNER JOIN instructor i ON cl.InstructorID = i.InstructorID
                             INNER JOIN room r ON cl.RoomID = r.RoomID
                             WHERE c.CourseCode LIKE ?";

        // Prepare and bind the statement
        $stmt = $db_connect->prepare($retrieve_Classes);
        $searchParam = '%' . $courseCode . '%'; // Allow for partial matches
        $stmt->bind_param('s', $searchParam);

        // Execute the statement
        $stmt->execute();
        $result = $stmt->get_result();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIST OF CLASSES</title>
    
</head>

<body>
    <form method="POST">
        <label for="course_code">Course Code:</label>
        <input type="text" id="course_code" name="course_code" required><br><br>
        <input type="submit" value="Search Classes">
    </form>

    <div>
        <h2>List of Classes</h2>
        <table border="1">
            <tr>
                <th>Course Code</th>
                <th>Course Name</th>
                <th>Instructor</th>
                <th>Room</th>
                <th>Schedule</th>
            </tr>

            <?php
            // If a search was performed, display the filtered results
            if (isset($result)) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['CourseCode'] . "</td>";
                    echo "<td>" . $row['CourseName'] . "</td>";
                    echo "<td>" . $row['InstructorName'] . "</td>";
                    echo "<td>" . $row['RoomName'] . "</td>";
                    echo "<td>" . $row['Schedule'] . "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </div>
</body>

</html>