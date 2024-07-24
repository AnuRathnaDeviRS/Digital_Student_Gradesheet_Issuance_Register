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

if(isset($_POST['bystudent']))
{

$rollnumber=$_POST['rollnumber'];
 var_dump($rollnumber);

    
    $sql="select * from addstudentdetails ";

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
                width:100%;
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
            /* .content
            {
                margin-left:40%;
                margin-top:3%;
            } */

            .content
            {
                margin-left:17%;
                margin-top:3%;
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
.resizable-table {
    width: 99%; /* Set the desired width of the table */
    height: 100px; /* Set the desired height of the table */
    /* Add other styling properties as needed */
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
                </li>         -->
            </ul>
        </aside>
        <div class="content">
            <div class="col-md-12 head">
                <div class="float-end">
                    <a href="exportstu.php" class="btn btn-success"><i class="dwn"></i>Export</a>

                </div>
            </div>
    <table border=1 class="resizable-table">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
               <tr>
        <th>Name</th>
        <td><?php echo $row['name']; ?></td>
    </tr>
    <tr>
        <th>Roll Number</th>
        <td><?php echo $row['rollnumber']; ?></td>
    </tr>
    <tr>
        <th>Batch Name</th>
        <td><?php echo $row['batchname']; ?></td>
    </tr>
    <tr>
        <th>Mail ID</th>
        <td><?php echo $row['mailid']; ?></td>
    </tr>
    <tr>
        <th>Address</th>
        <td><?php echo $row['address']; ?></td>
    </tr>
    <tr>
        <th>Blood Group</th>
        <td><?php echo $row['bloodgroup']; ?></td>
    </tr>
    <tr>
        <th>Mobile</th>
        <td><?php echo $row['mobile']; ?></td>
    </tr>
    <tr>
        <th>DOB</th>
        <td><?php echo $row['dob']; ?></td>
    </tr>
    <tr>
        <th>Course Name</th>
        <td><?php echo $row['coursename']; ?></td>
    </tr>
    <tr>
        <th>Sem1</th>
        <td><?php echo $row['sem1']; ?></td>
    </tr>
    <tr>
        <th>Sem2</th>
        <td><?php echo $row['sem2']; ?></td>
    </tr>
    <tr>
        <th>Sem3</th>
        <td><?php echo $row['sem3']; ?></td>
    </tr>
    <tr>
        <th>Sem4</th>
        <td><?php echo $row['sem4']; ?></td>
    </tr>
    <tr>
        <th>Sem5</th>
        <td><?php echo $row['sem5']; ?></td>
    </tr>
    <tr>
        <th>Sem6</th>
        <td><?php echo $row['sem6']; ?></td>
    </tr>
    <tr>
        <th>Sem7</th>
        <td><?php echo $row['sem7']; ?></td>
    </tr>
    <tr>
        <th>Sem8</th>
        <td><?php echo $row['sem8']; ?></td>
    </tr>
    <tr>
        <th>Provisional</th>
        <td><?php echo $row['provisional']; ?></td>
    </tr>
    <tr>
        <th>Consolidated</th>
        <td><?php echo $row['consolidated']; ?></td>
    </tr>
    <tr>
        <th>Degree</th>
        <td><?php echo $row['degree']; ?></td>
    </tr>
            <?php
        }
        ?>
    </table>
</div>

        

        
    </body>
</html>

        
    <?php } 
     ?>




