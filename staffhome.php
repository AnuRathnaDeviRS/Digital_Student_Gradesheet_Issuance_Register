<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("location:index.php");
}
else if($_SESSION['usertype']=='admin')
{
    header("location:index.php");
}
else if($_SESSION['usertype']=='student')
{
    header("location:index.php");
}


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Staff dashboard</title>
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
                margin-left:40%;
                margin-top:3%;
            }
        </style>
    </head>
    <body>
    <header class="header">
            <a href="" style="text-decoration:none">Staff Dashboard</a>
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
            <h1 style="margin-left:10%">CHARACTER IS LIFE</h1>
            <img src="arutselvar.jpeg" alt="Fr.mahalingam" width="500" height="500" style="margin:auto;padding-top:10px">


        </div>
    </body>
</html>
