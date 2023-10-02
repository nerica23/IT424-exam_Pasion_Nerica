<?php
session_start();
require 'connection.php';

if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);

    $query = "DELETE FROM students WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_student']))
{
    $Person_id = mysqli_real_escape_string($con, $_POST['Person_id']);

    $Last_Name = mysqli_real_escape_string($con, $_POST['Last_Name']);
  
    $query = "UPDATE person SET Last_Name='$Last_Name' WHERE Person_id='$Person_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Updated Successfully";
        header("Location: dashboard1.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Updated";
        header("Location: index.php");
        exit(0);
    }

}

if(isset($_POST['save_record']))

{
    
    $person_id = mysqli_real_escape_string($conn, $_POST['person_ID']);
    $date_visited = mysqli_real_escape_string($conn, $_POST['date_visited']);
    $time_in = mysqli_real_escape_string($conn, $_POST['time_In']);
    $time_out = mysqli_real_escape_string($conn, $_POST['time_Out']);


    // Get the current date and time
     $query = "INSERT INTO visitor_log (person_ID, date_visited, time_In, time_Out) VALUES ('$person_id', '$date_visited', '$time_in', '$time_out')";

    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Recorded Successfully";
        header("Location: dashboard1.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Error";
        header("Location: student-create.php");
        exit(0);
    }
}




            
                      
            

            mysqli_close($conn);
    





?>
