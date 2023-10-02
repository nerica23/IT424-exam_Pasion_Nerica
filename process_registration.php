<?php
include('DB_Config.php');

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize variables with hardcoded values (this part can be removed)
    $courseID = 1; // Replace with the default course code
    $instructorID = 1; // Replace with the default instructor ID
    $roomID = 1; // Replace with the default room ID

    // Get data from the HTML form
    $courseCode = $_POST['course_code'];
    $instructorID = $_POST['instructor'];
    $roomID = $_POST['room'];
    $schedule = $_POST['schedule'];

    // Create an SQL INSERT statement for your class table
    $insertRegistrationSQL = "INSERT INTO class (CourseID, InstructorID, RoomID, Schedule)
                              VALUES ('$courseID', '$instructorID', '$roomID', '$schedule')";

    // Execute the INSERT statement
    if ($db_connect->query($insertRegistrationSQL) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $insertRegistrationSQL . "<br>" . $db_connect->error;
    }

    // Close the database connection
    $db_connect->close();
}
?>
