<?php

$host="localhost";
$user="root";
$password="";
$db="COE";
$data=mysqli_connect($host,$user,$password,$db);
function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
}

// Excel file name for download 
$fileName = "student_" . date('Y-m-d') . ".xls"; 
$rollnumber=$_POST['rollnumber'];
var_dump($rollnumber);exit;
// Column names 
$fields = array('NAME', 'ROLLNUMBER', 'BATCH NAME', 'MAIL ID', 'ADDRESS', 'BLOODGROUP', 'MOBILE','DOB','COURSE NAME',
'SEM1','SEM2','SEM3','SEM4','SEM5','SEM6','SEM7','SEM8','PROVISIONAL','CONSOLIDATED','DEGREE'); 
// Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n"; 
 
// Fetch records from database 
$query = $data->query("select * from addstudentdetails where rollnumber='$rollnumber'"); 
if($query->num_rows > 0){ 
    // Output each row of the data 
    while($row = $query->fetch_assoc()){ 
        
        $lineData = array($row['name'], $row['rollnumber'], $row['batchname'], $row['mailid'], $row['address'], $row['bloodgroup'],
         $row['mobile'],$row['dob'],$row['coursename'],$row['sem1'],$row['sem2'],$row['sem3'],$row['sem4'],$row['sem5'],$row['sem6'],$row['sem7'],
         $row['sem8'],$row['provisional'],$row['consolidated'],$row['degree']); 
        array_walk($lineData, 'filterData'); 
        $excelData .= implode("\t", array_values($lineData)) . "\n"; 
    } 
}else{ 
    $excelData .= 'No records found...'. "\n"; 
} 

// Headers for download 
header("Content-Type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=\"$fileName\""); 
 
// Render excel data 
echo $excelData; 
 
exit();
?>