<?php
session_start();
include('dbconnection.php');

require '.\vendor\autoload.php';


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if(isset($_POST['save_excel_data']))
{
    $fileName = $_FILES['import_file']['name'];
    // echo "Processing file: $fileName<br>";exit;
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowed_ext = ['xls','csv','xlsx'];

    if(in_array($file_ext, $allowed_ext))
    {
        $inputFileNamePath = $_FILES['import_file']['tmp_name'];
        echo "Processing file: $inputFileNamePath<br>";
        // $fileHandle = fopen($inputFileNamePath, 'r');
        // echo "fileHandle: $fileHandle<br>";
        // // Loop through each row in the file
        // while (($row = fgetcsv($fileHandle, 1000, ',')) !== false) {
        //     // Add the row to the data arra
        //     var_dump($row);
        //     echo "fileHandle: $row<br>";exit;
        //     $data[] = $row;
        // }
        $host="localhost";
$user="root";
$password="";
$db="COE";
$con=mysqli_connect($host,$user,$password,$db);
        $spreadsheet =\PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();
        // var_dump($data[1]);
        // echo "Processing file: $data<br>";exit;
        $count = "0";
        foreach($data as $row)
        {
            if($count > 0)
            {
                $name = $row['0'];
                $rollnumber = $row['1'];
                $batchname = $row['2'];
                $mailid = $row['3'];
                $address = $row['4'];
                $bloodgroup = $row['5'];
                $mobile = $row['6'];
                $dob = $row['7'];
                $coursename = $row['8'];
                
                $studentQuery = "INSERT INTO addstudentdetails (name,rollnumber,batchname,mailid,address,bloodgroup,mobile,dob,coursename) 
                VALUES ('$name','$rollnumber','$batchname','$mailid','$address','$bloodgroup','$mobile','$dob','$coursename')";
                $result=mysqli_query($con,$studentQuery);



                // $studentQuery = "INSERT INTO addstudentdetails (name,rollnumber,sem1,sem2,sem3,sem4,sem5,sem6,sem7,sem8,provisional,
                // consolidated,degree) 
                // VALUES ('$name','$rollnumber','$sem1','$sem2','$sem3','$sem4','$sem5','$sem6','$sem7','$sem8','$provisional',
                // '$consolidated','$sem7')";
                //  $result=mysqli_query($con,$studentQuery);


                // $result = mysqli_query($con, $studentQuery);
                $msg = true;
            }
            else
            {
                $count = "1";
            }
        }

        if(isset($msg))
        {
            $_SESSION['message'] = "Successfully Imported";
            header('Location:addstudentdetails.php');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not Imported";
            header('Location: addstudentdetails.php');
            exit(0);
        }
    }
    else
    {
        $_SESSION['message'] = "Invalid File";
        header('Location: addstudentdetails.php');
        exit(0);
    }
}
?>