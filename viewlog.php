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



    $sql="select * from addlog ";

    $result=mysqli_query($data,$sql);
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
            }
            .addcourse
            {
                float:left;
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
                margin-left:17%;
                margin-top:3%;
                margin-top:20px;
            }
            .addcourse{
                margin-bottom:10px;
                margin-left:260px;
                margin-top:20px;
            }
            /* th,td{
                padding:15px;
            } */

            /* Apply basic styles to the entire table */
table {
  width: 80%;
  border-collapse: collapse;
  margin-bottom: 20px;
  margin: 0;
  margin-right:10px;
  margin-top:70px;
}


/* Style header cells */
th {
  background-color: #f2f2f2;
  border: 1px solid #dddddd;
  padding: 8px;
  text-align: left;
}

/* Style regular cells */
td {
  border: 1px solid #dddddd;
  padding: 8px;
}

/* Apply a light background color to even rows for better readability */
tr:nth-child(even) {
  background-color: #f9f9f9;
}

/* Hover effect on rows for better user interaction */
tr:hover {
  background-color: #e5e5e5;
}
body, html {
  margin: 0;
  padding: 0;
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
                </li>                 -->
            </ul>
        </aside>
        <div class="addcourse">
                <a href="addlog.php" class="btn btn-primary">Add Log</a> 
            </div>
        <div class="content">
        
        <table border=1 cellpadding=2>
            <tr><th>Staff Name</th>
            <th>Batch Name</th>
            <th>Semester</th>
            <th>Roll Number</th>
            <th>Date</th>
    </tr>
    <?php 
    while($row=mysqli_fetch_assoc($result)) {
        ?>
    <tr>
                <td><?php echo $row['staffname']; ?></td>
                <td><?php echo $row['batchname']; ?></td>
                <td><?php echo $row['semester']; ?></td>
                <td><?php echo $row['rollnumber']; ?></td>
                <td><?php echo $row['issuedate']; ?></td>
    </tr>
    <?php } ?>


        </div>
    </body>
</html>

        
   



