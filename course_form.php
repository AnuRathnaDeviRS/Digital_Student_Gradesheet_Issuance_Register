<?php
// Include database connection

$host="localhost";
$user="root";
$password="";
$db="COE";
$con=mysqli_connect($host,$user,$password,$db);
// Fetch roll numbers based on the selected batch name
if (isset($_POST['coursename'])) {
    $coursename = $_POST['coursename'];
    $querys = "SELECT specialisation FROM addcourse where coursename='$coursename' ";
    $result = mysqli_query($con, $querys);
    // $option='';
    // while ($row = mysqli_fetch_assoc($results)) {
    //     $specialisation = $row['specialisation'];
    //     $option .= "<option value='$specialisation'>$specialisation</option>";
    // }
        // Generate roll number options
        
 $options='<label>Specialisation:</label>';
 $options .='<select name="specialisation">';

        // $options = '<option>Choose Roll Number</option>';
        while($row = mysqli_fetch_assoc($result)) {
            $options .= '<option>' . $row['specialisation'] . '</option>';
        }
        $options .='</select>';
    
    
    // Echo roll number options
    echo $options;
}


?>


