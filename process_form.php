<?php
// Include database connection

$host="localhost";
$user="root";
$password="";
$db="COE";
$con=mysqli_connect($host,$user,$password,$db);
// Fetch roll numbers based on the selected batch name
if (isset($_POST['batchname'])) {
    $batchname = $_POST['batchname'];
    $query = "SELECT rollnumber FROM addstudentdetails WHERE batchname = '$batchname'";
    $result = mysqli_query($con, $query);

    // Generate roll number options
    $options = '<label>Roll Number</label>';
    $options .= '<div class="checkbox-options" style="margin-left:100px;">'; // Enclose options in a div for styling
    while ($row = mysqli_fetch_assoc($result)) {
        $options .= '<label><input type="checkbox" name="rollnumbers[]" value="' . $row['rollnumber'] . '">' . $row['rollnumber'] . '</label><br>';
    }
    $options .= '</div>';

    // Echo roll number options
    echo $options;
}


?>


