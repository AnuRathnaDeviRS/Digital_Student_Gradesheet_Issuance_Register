<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("location:index.php");
}
else if($_SESSION['usertype']=='alumni')
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

if(isset($_POST['add_student']))
{
    $username=$_POST['name'];
    $user_email=$_POST['email'];
    $user_phone=$_POST['phone'];
    $usertype="student";
    $user_password=$_POST['password'];

    $check="SELECT * from user where username='$username' ";

    $check_user=mysqli_query($data,$check);

    $row_count=mysqli_num_rows($check_user);

    if($row_count==1)
    {
        echo "<script type='text/javascript'>
        alert('username already exist.Try another one');
         </script>";

    }
    else
    {

    $sql="INSERT INTO user(username,email,phone,usertype,password ) VALUES ('$username','$user_email','$user_phone','$usertype','$user_password')";

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
                margin-left:20%;
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
                 background-image: url('kct.jpeg');
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
            }
        </style>
    </head>
    <body>
        <header class="header">
            <a href="" style="text-decoration:none">Add Student</a>
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
            <center>

            <h1>Add Student</h1>

            <div class="div_deg">
                <form action="#" method="POST">
                    <!-- id,username,phone,email,usertype,password -->
                    <div>
                        <label> Username</label>
                        <input type="text" name="name">
                    </div>

                    <div>
                        <label> Email</label>
                        <input type="text" name="email">
                    </div>

                    <div>
                        <label> Phone</label>
                        <input type="number" name="phone">
                    </div>

                    <div>
                        <label> Password</label>
                        <input type="text" name="password">
                    </div>
                    <div>
                        <input type="submit" class="btn btn-primary" name="add_student" value="Add Student">
                    </div>
                </form>
            </div>
            </center>

        </div>
    </body>
</html>