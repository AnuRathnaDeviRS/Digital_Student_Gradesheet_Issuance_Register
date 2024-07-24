<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("location:index.php");
}
else if($_SESSION['usertype']=='student')
{
    header("location:index.php");
}
else if($_SESSION['usertype']=='staff')
{
    header("location:index.php");
}

$host="localhost";
$user="root";
$password="";
$db="COE";
$data=mysqli_connect($host,$user,$password,$db);

if(isset($_POST['add_course']))
{
$courseid=$_POST['courseid'];
$coursename=$_POST['coursename'];
$specialisation=$_POST['specialisation'];
$numberofyears=$_POST['numberofyears'];
$numberofsemesters=$_POST['numberofsemesters'];

    
    $sql="INSERT INTO addcourse(courseid,coursename,specialisation,numberofyears,numberofsemesters ) VALUES ('$courseid','$coursename','$specialisation','$numberofyears','$numberofsemesters')";

    $result=mysqli_query($data,$sql);

    if($result)
    {
        echo "<script type='text/javascript'>
        alert('Data upload success');
         </script>";
    }
    else
    {
        echo "upload failed";
    }


}

?>
<!DOCTYPE html>
<html>
    <head> 
        <meta charset="utf-8">
        <title>Admin dashboard</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">


        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">


        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <style>
             *
            {
                margin:0px;
                padding:0px;
            }
            .header
            {
                background-color:#4db8ff;
                line-height:70px;
                padding-left:30px;
            }
            a
            {
                text-decoration:none;
            }
            .logout
            {
                float:right;
                padding-right:30px;
                padding-top:5px;
            }
            ul
            {
                background-color:#424a5b;
                width:16%;
                height:100%;
                position:fixed;
                padding-top:5%;
                text-align:center;
            }
            ul li
            {
                list-style:none;
                padding-bottom:30px;
                font-size:15px;
            }
            ul li a
            {
                color:white;
                font-weight:bold;
            }
            ul li a:hover
            {
                color:skyblue;
                text-decoration:none;
            }
            .content
            {
                margin-left:50%;
                margin-top:5%;
            }
            label
            {
                display:inline-block;
                text-align:right;
                width:100px;
                padding-top:10px;
                padding-bottom:10px;
            }
            body
             {
                 /* background-image: url('kct.jpeg'); */
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
            }
            .div_deg
            {
                background-color:white;
                width:400px;
                padding-top:70px;
                padding-bottom:70px;
                padding-right:70px;
                margin-left:45%;
                box-shadow: 10px 10px;
                border-radius:25px;
                border:1px solid black;
            }
            
        </style>
    </head>
    <body>
        <header class="header">
            <a href="" style="text-decoration:none">Admin Dashboard</a>
            <div class="logout">
                <a href="logout.php" class="btn btn-primary">Logout</a> 
            </div>
        </header>
        <aside>
            <ul>


            <li>
                    <a href="studentpage.php">Student</a>
                </li>
                <li>
                    <a href="staffpage.php">Staff</a>
                </li>
                <li>
                    <a href="course.php">Course</a>
                </li>
                <li>
                    <a href="addlog.php">Staff Log</a>
                </li>
                <!-- <li>
                    <a href="reports.php">Reports</a>
                </li> -->
                <!-- <li>
                    <a href="addstudentdetails.php">Add Student Details</a>
                </li>
                <li>
                    <a href="addstudent.php">Add Student</a>
                </li>
                
                <li>
                    <a href="student.php">View Student</a>
                </li>
                <li>
                    <a href="edit.php">Edit Student Details</a>
                </li>
                <li>
                    <a href="addstaffdetails.php">Add Staff Details</a>
                </li>
                <li>
                    <a href="addstaff.php">Add Staff</a>
                </li>
                
                <li>
                    <a href="staff.php">View Staff</a>
                </li>
                <li>
                    <a href="course.php">Course</a>
                </li>
                <li>
                    <a href="addlog.php">Staff Log</a>
                </li>   
                <li>
                    <a href="adduser.php">Add User</a>
                </li>    -->
                
                
            </ul>
        </aside>
        <div class="content">
            <h1>Add Course</h1>
        </div>
        <div class="div_deg">
                <form action="#" method="POST">
                    <div>
                        <label> Course ID</label>
                        <input type="number" name="courseid">
                    </div>
                    <div>
                        <label>Course Name</label>
                        <input type="text" name="coursename">
                    </div>

                    <div>
                        <label>Specialisation</label>
                        <input type="text" name="specialisation">
                    </div>

                    <div>
                        <label>Number of years</label>
                        <input type="number" name="numberofyears">
                    </div>

                    <div>
                        <label>Number of semesters</label>
                        <input type="number" name="numberofsemesters">
                    </div>
                    <div>
                        <input type="submit" style="margin-left:48%" class="btn btn-primary" name="add_course" value="Add Course">
                    </div>
                </form>
            </div>
    </body>
</html>