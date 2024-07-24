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

if(isset($_POST['add_log']))
{
   
$staffname=$_POST['staffname'];
$batchname=$_POST['batchname'];

$semester=$_POST['semester'];
$rollnumber=$_POST['rollnumbers'];

$issuedate=$_POST['issuedate'];

$updateSem = 'sem' . $_POST['semester'];




    foreach ($rollnumber as $roll){

        $sql="INSERT INTO addlog(staffname,batchname,semester,rollnumber,issuedate ) VALUES ('$staffname','$batchname','$semester','$roll','$issuedate')";
    
        $result=mysqli_query($data,$sql);

        $sql2="UPDATE `addstudentdetails` SET  $updateSem='Yes' WHERE rollnumber='$roll'";
        $result2=mysqli_query($data,$sql2);
        
    }
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


// Assuming you have already established a database connection

// if(isset($_POST['batchname'])) {
//     $desiredBatchName = $_POST['batchname'];

//     // Now you can use $desiredBatchName in your SQL query
//     // For example:
//     $sql = "SELECT * FROM  WHERE batchname = '$desiredBatchName'";
//     $result = mysqli_query($data, $sql);

//     // Process the result...
// }



// $query = "SELECT rollnumber FROM addstudentdetails where";
// $query = "SELECT addstudentdetails.rollnumber, addlog.rollnumber
// FROM addstudentdetails
// JOIN addlog ON addstudentdetails.batchname = addlog.batchname
// WHERE addstudentdetails.batchname = 'desiredbatchname';
// ";
//     $result = mysqli_query($data, $query);
//     $options='';
//     while ($row = mysqli_fetch_assoc($result)) {
//         $coursename = $row['coursename'];
//         $options .= "<option value='$coursename'>$coursename</option>";
//     }

$query = "SELECT DISTINCT batchname FROM addstudentdetails order by batchname";
    $result = mysqli_query($data, $query);
    $options='';
    while ($row = mysqli_fetch_assoc($result)) {
        $batchname = $row['batchname'];
        $options .= "<option value='$batchname'>$batchname</option>";
    }

?>
<!DOCTYPE html>
<html>
    <head> 
        <meta charset="utf-8">
        <title>Admin dashboard</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">


        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">


        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> -->
        <script>
function loadRollNumbers() {

    // Get the selected batch name
      
    var batchname = document.getElementById('batchname').value;
 

    // Make an AJAX request to process_form.php to fetch roll numbers
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'process_form.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    console.log("test",xhr.responseText);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Update the rollnumber-container with the response
            document.getElementById('rollnumber-container').innerHTML = xhr.responseText;
        }
    };
    xhr.send('batchname=' + batchname);
}
</script>
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
                margin-left:42%;
                box-shadow: 10px 10px;
                border-radius:25px;
            }

            /* #rollnumber-container{
                margin-left:100px;

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
                </li>   
                 -->
                
            </ul>
        </aside>
        <div class="content">
            <h1>Add Log</h1>
        </div>
        <div class="div_deg">
                <form action="#" method="POST">
                <div>
                        <label>Staff Name</label>
                        <input type="text" name="staffname">
                    </div>
                    
                        <!-- <div>
                        <label for="batchname">Batch Name:</label>
                        <input type="text" id="batchname" name="batchname" onchange="loadRollNumbers()">
                        </div> -->



                        <div>
                        <label for="batchname">Batch Name:</label>
                        <select id="batchname" name="batchname" onchange="loadRollNumbers()">
                        <option value="">Select Batch</option>
                        <?php echo $options;?>
                        <!-- Options will be loaded dynamically via JavaScript -->
                        </select>
                        </div>



                    <!-- <div>
                        <label>Batch Name</label>
                        <select name="batchname">
                        <option>Choose the Batch</option>
                        <?php echo $options;?>
                        </select>
                    </div> -->
<!-- </form> -->
                    <div>
                        <label>Semester</label>
                        <input type="number" name="semester">
                    </div>

                    <!-- <div>
                        <label>Roll Number</label>
                        <input type="text" name="rollnumber">
                    </div> -->
                    <!-- <div>
                        <label>Roll Number
                        </label>
                    </div> -->
                    <div id="rollnumber-container">
                          <!-- <label>Roll Number</label>
                        <select name="rollnumber">
                        <option>Choose the Department</option> 
                         </select>  -->
                    </div>
                    <div>
                        <label>Date</label>
                        <input type="date" name="issuedate">
                    </div>
                    <div>
                        <input type="submit" style="margin-left:35%" class="btn btn-primary" name="add_log" value="Add Log">
                        <a href="viewlog.php" class="btn btn-primary">View Log</a> 
                    </div>
                
                </form>
              
            </div>
        
    </body>
</html>

