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
                /* background-color:skyblue; */
                background-color:#4db8ff;
                line-height:70px;
                padding-left:30px;

                

            }
            .search{
                margin-top:25px;
                margin-right:70px;
               margin-left:60%;
                width:20%;
                height:20px;
                border-radius:5px;
                border:none;               
            }
            a
            {
                text-decoration:none;
            }
            .logout
            {
                float:right;
                padding-right:30px;
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
                margin-left:350px;
               
                margin-top:150px;
            }
            .first{
                border: solid black;
                background-color:#4db8ff;
                
                width:250px;
                height:200px;
                /* text-align:center; */
                display:inline-block;
                margin-right:20px;
                font-size:20px;
                border-radius: 25px;
                box-shadow: 10px 10px;
                font-weight:bold
            }
            
        </style>
    </head>
    <body>
        <header class="header">
            <a href="" style="text-decoration:none">Admin Dashboard</a>
            <!-- <input type="search" class="search" placeholder="Search..." name="">  -->
           
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
             <!--                 
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
                    <a href="studentpage.php">Student</a>
                </li><li>
                    <a href="addstudentdetails.php">Add Student Details</a>
                </li>
                
                <li>
                    <a href="addstaffdetails.php">Add Staff Details</a>
                </li>
                <li>
                    <a href="uploadmarksheet.php">Marksheet</a>
                </li>
                <li>
                    <a href="staff.php">View Staff</a>
                </li>
                <li>
                    <a href="course.php"> Course</a>
                </li>  
                <li>
                    <a href="addlog.php">Staff Log</a>
                </li>   
                <li>
                    <a href="adduser.php">Add User</a>
                </li>                -->
            </ul>
        </aside>
        <div class="content">
           

           <div class="first" onclick="window.location.href='addstaff.php';">
                <a href="addstaff.php" style="display: inline-block; margin-top: 50px;color:black;">Add Staff as user</a>
           </div>
           <div class="first" onclick="window.location.href='addstaffdetails.php';">
                <a href="addstaffdetails.php" style="display: inline-block; margin-top: 50px;color:black">Add Staff Details</a>
           </div>
           <div class="first" onclick="window.location.href='staff.php';">
                <a href="staff.php" style="display: inline-block; margin-top: 50px;color:black">View Staff</a>
           </div>
           <div class="first" onclick="window.location.href='editstaff.php';">
                <a href="editstaff.php" style="display: inline-block; margin-top: 50px;color:black">Edit Staff</a>
           </div>


           
           
        </div>
    </body>
</html>