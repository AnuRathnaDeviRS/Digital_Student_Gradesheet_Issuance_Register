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
else if($_SESSION['usertype']=='admin')
{
    header("location:index.php");
}

$host="localhost";
$user="root";
$password="";
$db="COE";
$data=mysqli_connect($host,$user,$password,$db);

// if(isset($_POST['add_course']))
// {
// $courseid=$_POST['courseid'];
// $coursename=$_POST['coursename'];
// $specialisation=$_POST['specialisation'];
// $numberofyears=$_POST['numberofyears'];
// $numberofsemesters=$_POST['numberofsemesters'];

    
//     $sql="INSERT INTO addcourse(courseid,coursename,specialisation,numberofyears,numberofsemesters ) VALUES ('$courseid','$coursename','$specialisation','$numberofyears','$numberofsemesters')";

//     $result=mysqli_query($data,$sql);

//     if($result)
//     {
//         echo "<script type='text/javascript'>
//         alert('Data upload success');
//          </script>";
//     }
//     else
//     {
//         echo "upload failed";
//     }


// }

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
                padding-bottom:60px;
                padding-right:70px;
                margin-left:45%;
                box-shadow: 10px 10px;
                border-radius:25px;
                border:1px solid black;
            }
            form a
            {
                color:white;
                text-decoration:none;
               
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
                    <a href="addstudentdetailsforstaff.php">Add Student Details</a>
                </li>
                
                <li>
                    <a href="studentforstaff.php">View Student</a>
                </li>
                <li>
                    <a href="editforstaff.php">Edit Student</a>
                </li>
                
                
            </ul>
        </aside>
        <div class="content">
            <h1>Edit Students</h1>
        </div>
        <div class="div_deg">
                <form action="editstudentdetails.php" method="POST">
                    
                        

                    <div>
                        <label>Batch Name</label>
                        <input type="text" name="batchname">
                    </div>
                    <div>
                        <button style=" margin-left:140px ;margin-top:20px" class="btn btn-primary" name="edit_student">
                            Edit Student
                        </button>
                        <!-- <input type="submit" style=" margin-left:140px" class="btn btn-primary" name="add_course" > -->
                    </div>
                </form>
            </div>
    </body>
</html>