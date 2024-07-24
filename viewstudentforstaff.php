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


$host="localhost";
$user="root";
$password="";
$db="COE";
$data=mysqli_connect($host,$user,$password,$db);

if(isset($_POST['view_student']))
{
$batchname=$_POST['batchname'];


    
    $sql="select * from addstudentdetails where batchname='$batchname'";

    $result=mysqli_query($data,$sql);
    // while($row=mysqli_fetch_assoc($result)) { ?>

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
    <table border=1 class="resizable-table">
        <tr>
            <th>Name</th>
            <th>Roll Number</th>
            <th>Batch Name</th>
            <th>Mail ID</th>
            <th>Address</th>
            <th>Blood Group</th>
            <th>Mobile</th>
            <th>DOB</th>
            <th>Course Name</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['rollnumber']; ?></td>
                <td><?php echo $row['batchname']; ?></td>
                <td><?php echo $row['mailid']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['bloodgroup']; ?></td>
                <td><?php echo $row['mobile']; ?></td>
                <td><?php echo $row['dob']; ?></td>
                <td><?php echo $row['coursename']; ?></td>
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




