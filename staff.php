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

$query = "SELECT DISTINCT specialisation FROM addcourse";
    $result = mysqli_query($data, $query);
    $options='';
    while ($row = mysqli_fetch_assoc($result)) {
        $specialisation = $row['specialisation'];
        $options .= "<option value='$specialisation'>$specialisation</option>";
    }



$query = "SELECT DISTINCT specialisation FROM addcourse";
    $result = mysqli_query($data, $query);
    $options='';
    while ($row = mysqli_fetch_assoc($result)) {
        $specialisation= $row['specialisation'];
        $options .= "<option value='$specialisation'>$specialisation</option>";
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
                padding-bottom:60px;
                padding-right:70px;
                margin-left:42%;
                border:1px solid black;
                box-shadow: 10px 10px;
                border-radius:25px;
            }
            form a
            {
                color:white;
                text-decoration:none;
               
            }
            




            /* .div_deg {
    width: 300px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
}

.div_deg label {
    display: block;
    margin-bottom: 5px;
}

.div_deg select {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
    box-sizing: border-box;
}

.div_deg button {
    width: 100%;
    padding: 5px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    transition: background-color 0.3s;

}

.div_deg button:hover {
    background-color: #0056b3;
} */
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
                </li>    -->
                
                
            </ul>
        </aside>
        <div class="content">
            <h1>View Staff</h1>
        </div>
        <div class="div_deg">
                <form action="viewstaff.php" method="POST">
                    
                        

                    <!-- <div>
                        <label>Department</label>
                        <input type="text" name="department">
                    </div> -->

                    
                    <div>
                        <label>Department</label>
                        <select name="specialisation" >
                        <option>Choose the Specialisation</option>
                        <?php echo $options;?>
                        </select>
                    </div>

                    
                    <div>
                        <button style=" margin-left:140px ;margin-top:20px" class="btn btn-primary" name="view_staff">
                            View Staff
                        </button>
                        <!-- <input type="submit" style=" margin-left:140px" class="btn btn-primary" name="add_course" > -->
                    </div>
                </form>
            </div>
    </body>
</html>