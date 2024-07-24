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

if(isset($_POST['add_studentdetails']))
{
$name=$_POST['name'];
$rollnumber=$_POST['rollnumber'];
$batchname=$_POST['batchname'];
$mailid=$_POST['mailid'];
$address=$_POST['address'];
$bloodgroup=$_POST['bloodgroup'];
$mobile=$_POST['mobile'];
$dob=$_POST['dob'];
$coursename=$_POST['coursename'];
$specialisation=$_POST['specialisation'];
$sem1=$_POST['sem1'];
    $sem2=$_POST['sem2'];
    $sem3=$_POST['sem3'];
    $sem4=$_POST['sem4'];
    $sem5=$_POST['sem5'];
    $sem6=$_POST['sem6'];
    $sem7=$_POST['sem7'];
    $sem8=$_POST['sem8'];
    $provisional=$_POST['provisional'];
    $consolidated=$_POST['consolidated'];
    $degree=$_POST['degree'];
// $coursename = mysqli_real_escape_string($data,$_POST['coursename']);    
// $id = mysqli_real_escape_string($data,$_POST['courseid']); 


    $sql="INSERT INTO addstudentdetails(name,rollnumber,batchname,mailid,address,bloodgroup,mobile,dob,coursename,sem1,sem2,
    sem3,sem4,sem5,sem6,sem7,sem8,provisional,consolidated,degree) VALUES 
    ('$name','$rollnumber','$batchname','$mailid','$address','$bloodgroup','$mobile','$dob','$coursename','$sem1','$sem2','$sem3','$sem4',
    '$sem5','$sem6','$sem7','$sem8','$provisional','$consolidated','$degree')";

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

   
    



//   $options=array();
//   $result;

//     $sql = "SELECT coursename FROM addcourse";
// $result = $data->query($sql);
// // dd($result);
// if ($result) {

//     while ($row = mysqli_fetch_assoc($result)) {

//         $options[] = $row['coursename'];

//     }

// }




}
$query = "SELECT DISTINCT coursename FROM addcourse";
    $result = mysqli_query($data, $query);
    $options='';
    while ($row = mysqli_fetch_assoc($result)) {
        $coursename = $row['coursename'];
        $options .= "<option value='$coursename'>$coursename</option>";
    }

    $querys = "SELECT specialisation FROM addcourse where coursename='$coursename' ";
    $results = mysqli_query($data, $querys);
    $option='';
    while ($row = mysqli_fetch_assoc($results)) {
        $specialisation = $row['specialisation'];
        $option .= "<option value='$specialisation'>$specialisation</option>";
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
function loadRollNumbers(selectElement) {

    // Get the selected batch name
      
    var coursename = selectElement.value;
 

    // Make an AJAX request to process_form.php to fetch roll numbers
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'course_form.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    console.log("test",xhr.responseText);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Update the rollnumber-container with the response
            document.getElementById('rollnumber-container').innerHTML = xhr.responseText;
        }
    };
    xhr.send('coursename=' + coursename);
}
</script>
        <style>
             *
            {
                margin:0px;
                padding:0px;
            }
            /* .header
            {
                background-color:skyblue;
                line-height:70px;
                padding-left:30px;
            } */

            .header {
    background-color: skyblue;
    line-height: 70px;
    padding-left: 30px;
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 999; /* Ensure the header stays above other content */
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
                margin-top:120px;
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
                margin-top:2%;
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
                 background-color:white;
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
                padding-bottom:30px;
                padding-left:30px;
                padding-right:70px;
                margin-left:48%;
                margin-top:150px;
                margin-bottom:30px;
                box-shadow: 10px 10px;
                border-radius:25px;
                
            }
            
        </style>
    </head>
    <body>
        <header class="header">
            <a href="" style="text-decoration:none">Admin Dashboard</a>
            <div class="logout">
                <a href="logout.php" class="btn btn-primary">Logout</a> 
                <!-- <a href="studentbasic.php" class="btn btn-primary">Student details</a>  -->
            </div>
            <?php
                if(isset($_SESSION['message']))
                {
                    echo "<h4>".$_SESSION['message']."</h4>";
                    unset($_SESSION['message']);
                }
                ?>
            <div class="card-body">

<form action="uploadfile.php" method="POST" enctype="multipart/form-data">

    <input type="file" name="import_file" class="form-control" />
    <button type="submit" name="save_excel_data" class="btn btn-primary mt-3">Import</button>

</form>

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
            <h1>Add Students Details</h1>
        </div>
        <div class="div_deg">
                <form action="#" method="POST">
                    <div>
                        <label> Name</label>
                        <input type="text" name="name">
                    </div>
                    <div>
                        <label>Roll Number</label>
                        <input type="text" name="rollnumber">
                    </div>
                    <div>
                        <label>Batch Name</label>
                        <input type="text" name="batchname">
                    </div>

                    <div>
                        <label> Mailid</label>
                        <input type="text" name="mailid">
                    </div>
                    <div>
                        <label>Address</label>
                        <input type="text" name="address">
                    </div>
                    <div>
                        <label>Blood Group</label>
                        <input type="text" name="bloodgroup">
                    </div>

                    <div>
                        <label> Mobile</label>
                        <input type="number" name="mobile">
                    </div>
                    <div>
                        <label> DOB</label>
                        <input type="text" name="dob">
                    </div>
                    
                    
                      
                     
                    <div>
                        <label>Course name</label>
                        <select name="coursename" onchange="loadRollNumbers(this)">
                        <option>Choose the Course</option>
                        <?php echo $options;?>
                        </select>
                    </div>

                    <!-- <div>
                    <label for="coursename">Course Name:</label>
    <input type="text" id="coursename" name="coursename" onchange="loadRollNumbers()">
                    </div> -->

                    <!-- <div>
                        <label>Specialisation</label>
                        <select name="specialisation">
                        <option>Choose the Department</option>
                        <?php echo $option;?>
                        </select>
                    </div> -->

                    <div id="rollnumber-container">

                    </div>
                    <div>
                        <label>Sem1</label>
                        <select name="sem1">
                        <option value="Yes" >Yes</option>
                        <option value="No" selected>No</option>
                        <option value="Return">Return</option>
                        </select>
                    </div>

                    <div>
                        <label>Sem2</label>
                        <select name="sem2">
                        <option value="Yes" >Yes</option>
                        <option value="No" selected>No</option>
                        <option value="Return">Return</option>
                        </select>
                    </div>

                    <div>
                        <label>Sem3</label>
                        <select name="sem3">
                        <option value="Yes" >Yes</option>
                        <option value="No" selected>No</option>
                        <option value="Return">Return</option>
                        </select>
                    </div>

                    <div>
                        <label>Sem4</label>
                        <select name="sem4">
                        <option value="Yes" >Yes</option>
                        <option value="No" selected>No</option>
                        <option value="Return">Return</option>
                        </select>
                    </div>

                    <div>
                        <label>Sem5</label>
                        <select name="sem5">
                        <option value="Yes" >Yes</option>
                        <option value="No" selected>No</option>
                        <option value="Return">Return</option>
                        </select>
                    </div>

                    <div>
                        <label>Sem6</label>
                        <select name="sem6">
                        <option value="Yes" >Yes</option>
                        <option value="No" selected>No</option>
                        <option value="Return">Return</option>
                        </select>
                    </div>

                    <div>
                        <label>Sem7</label>
                        <select name="sem7">
                        <option value="Yes" >Yes</option>
                        <option value="No" selected>No</option>
                        <option value="Return">Return</option>
                        </select>
                    </div>

                    <div>
                        <label>Sem8</label>
                        <select name="sem8">
                        <option value="Yes" >Yes</option>
                        <option value="No" selected>No</option>
                        <option value="Return">Return</option>
                        </select>
                    </div>

                    <div>
                        <label>Provisional</label>
                        <select name="provisional">
                        <option value="Yes" >Yes</option>
                        <option value="No" selected>No</option>
                        <option value="Return">Return</option>
                        </select>
                    </div>

                    <div>
                        <label>Consolidated</label>
                        <select name="consolidated">
                        <option value="Yes" >Yes</option>
                        <option value="No" selected>No</option>
                        <option value="Return">Return</option>
                        </select>
                    </div>

                    <div>
                        <label>Degree</label>
                        <select name="degree">
                        <option value="Yes" >Yes</option>
                        <option value="No" selected>No</option>
                        <option value="Return">Return</option>
                        </select>
                    </div>
                    <div>
                        <input type="submit" style="margin-left:38%" class="btn btn-primary" name="add_studentdetails" value="Add Student details">
                    </div>
                </form>
            </div>
    </body>
</html>