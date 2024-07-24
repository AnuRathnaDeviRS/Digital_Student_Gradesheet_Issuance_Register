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


// $query = "SELECT coursename FROM addcourse";
//     $result = mysqli_query($data, $query);
//     $options='';
//     while ($row = mysqli_fetch_assoc($result)) {
//         $coursename = $row['coursename'];
//         $options .= "<option value='$coursename'>$coursename</option>";
//     }

if(isset($_POST['delete'])){
    $name= $_POST['name'];
    $qu = "DELETE FROM addstaffdetails WHERE name = '$name'";
    // $qu = "DELETE FROM addstaffdetails WHERE name like '%$name' or name like '$name%'";

    $res = mysqli_query($data, $qu);
    header('Location: editstaff.php');
    exit(0);
}
else if(isset($_POST['edit'])){
    $name = $_POST['name'];
    $mailid=$_POST['mailid'];
    $mobile=$_POST['mobile'];
    $specialisation=$_POST['specialisation'];



    

    echo '
    <style>
             *
            {
                margin:0px;
                padding:0px;
            }
            .header
            {
                background-color:skyblue;
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
                padding-top:3px;
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
                 
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
            }
            .div_deg
            {
                background-color:white;
                border:1px solid black;
                width:400px;
                padding-top:70px;
                padding-bottom:70px;
                padding-right:70px;
                margin-left:45%;
            }
            
        </style>




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
                    <a href="addstudentdetails.php">Add Student Details</a>
                </li>
                <li>
                    <a href="addstudent.php">Add Student</a>
                </li>
                
                <li>
                    <a href="student.php">View Student</a>
                </li>
                <li>
                    <a href="">Edit Student Details</a>
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
                </li>   
                 -->
                
            </ul>
        </aside>
        <div class="content">
            <h1>Add Staff Details</h1>
        </div>
        <div class="div_deg">
                <form action="#" method="POST">
                    <!-- id,username,phone,email,usertype,password -->
                   
                    <div>
                        <label> Name</label>
                        <input type="text" name="name" value='.$name.'>
                    </div>

                    <div>
                        <label> Mailid</label>
                        <input type="text" name="mailid" value='.$mailid.'>
                    </div>

                    <div>
                        <label> Mobile</label>
                        <input type="number" name="mobile" value='.$mobile.'>
                    </div>

                    <div>
                        <label> Department</label>
                        <input type="text" name="specialisation" value='.$specialisation.'>
                    </div>
                    <div>
                        <input type="submit" style="margin-left:48%" class="btn btn-primary" name="add_staffdetails" value="Add Staff">
                    </div>
                </form>
            </div>
    </body>
    
';
}

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $mailid=$_POST['mailid'];
    $mobile=$_POST['mobile'];
    $specialisation=$_POST['specialisation'];

    
    
    $q = "UPDATE addstaffdetails SET name='$name' mailid='$mailid',
    mobile='$mobile',specialisation='$specialisation'
     WHERE name = '$name'";
    $res = mysqli_query($data, $q);
    header('Location: editstaff.php');
    exit(0);
    // if(isset($_POST['delete'])){
    //     // Your code to delete the selected record goes here
    //     // After deletion, redirect to editstudentdetails.php
    //     header('Location: editstudentdetails.php');
    //     exit;
    // }
    // else if(isset($_POST['update'])) {
    //     // Your code to update the selected record goes here
    
    //     // After successful update, redirect to editstudentdetails.php
    //     header('Location: editstudentdetails.php');
    //     exit;
    // }
    
}

if(isset($_POST['edit_staff']))
{
$name=$_POST['name'];


    
    $sql="select * from addstaffdetails where name='$name'";

    $result=mysqli_query($data,$sql);
    // while($row=mysqli_fetch_assoc($result)) { ?>

    

<!DOCTYPE html>
<html>
    <head> 
        <meta charset="utf-8">
        <title>Admin dashboard</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">

        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

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
                width:142%;
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
    width: 90%; /* Set the desired width of the table */
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
                <li>
                    <a href="reports.php">Reports</a>
                </li>
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
                </li>               -->
            </ul>
        </aside>
        <div class="content">
    <table border=1 class="resizable-table">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Mail ID</th>
            <th>Mobile</th>
            <th>Specialisation</th>
            <th>Action</th>
            
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                 <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['mailid']; ?></td>
                <td><?php echo $row['mobile']; ?></td>
                <td><?php echo $row['specialisation']; ?></td>
                <td><form method="post" action="">
                <input type="hidden" name="id" value="<?=$row['id']?>">
                <input type="hidden" name="name" value="<?=$row['name']?>">
                <input type="hidden" name="mailid" value="<?=$row['mailid']?>">
                <input type="hidden" name="mobile" value="<?=$row['mobile']?>">
                <input type="hidden" name="specialisation" value="<?=$row['specialisation']?>">
                <button class="btn1" name="edit"><i class="material-icons" style="vertical-align: middle;color:#13005A">edit</i></button>|
                <button class="btn1" name="delete"><i class="material-icons" style="vertical-align: middle;color:red">delete</i></button>
            </form></td>

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




