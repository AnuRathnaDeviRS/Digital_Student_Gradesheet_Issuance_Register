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


$query = "SELECT coursename FROM addcourse";
    $result = mysqli_query($data, $query);
    $options='';
    while ($row = mysqli_fetch_assoc($result)) {
        $coursename = $row['coursename'];
        $options .= "<option value='$coursename'>$coursename</option>";
    }

if(isset($_POST['delete'])){
    $rollnumber= $_POST['rollnumber'];
    $qu = "DELETE FROM addstudentdetails WHERE rollnumber = '$rollnumber'";
    $res = mysqli_query($data, $qu);
    header('Location: editforstaff.php');
    exit(0);
}
else if(isset($_POST['edit'])){
    $name = $_POST['name'];
    $rollnumber=$_POST['rollnumber'];
    $batchname=$_POST['batchname'];
    $coursename=$_POST['coursename'];
    $mailid=$_POST['mailid'];
    $address=$_POST['address'];
    $bloodgroup=$_POST['bloodgroup'];
    $dob=$_POST['dob'];
    $mobile=$_POST['mobile'];
    // $specialisation=$_POST['specialisation'];
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

    echo '
    <style>
    *
   {
       margin:0px;
       padding:0px;
   }
//    .header
//    {
//        background-color:skyblue;
//        line-height:70px;
//        padding-left:30px;
//        position:relative;
//    }

.header {
    background-color: skyblue;
    line-height: 70px;
    padding-left: 30px;
    position: fixed;
    width: 100%; /* Ensure the header spans the entire width of the viewport */
    top: 0; /* Position the header at the top of the viewport */
    z-index: 1000; /* Ensure the header appears above other content */
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
        background-image: url("kct.jpeg");
       background-repeat: no-repeat;
       background-attachment: fixed;
       background-size: cover;
   }
   .div_deg
   {
       background-color:white;
       width:400px;
       padding-top:70px;
       padding-bottom:30px;
       padding-right:70px;
       margin-left:50%;
       margin-top:1%;
       
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
                    <a href="addstudentdetails.php">Add Student Details</a>
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
                    <a href="staff.php">View Staff</a>
                </li>
                <li>
                    <a href="course.php">Course</a>
                </li>               
            </ul>
        </aside></body>

<div class="div_deg">
                <form action="#" method="POST">
                    <div>
                        <label> Name</label>
                        <input type="text" name="name" value='.$name.'>
                    </div>
                    <div>
                        <label>Roll Number</label>
                        <input type="text" name="rollnumber" value='.$rollnumber.'>
                    </div>
                    <div>
                        <label>Batch Name</label>
                        <input type="text" name="batchname" value='.$batchname.'>
                    </div>

                    <div>
                        <label> Mailid</label>
                        <input type="text" name="mailid" value='.$mailid.'>
                    </div>
                    <div>
                        <label>Address</label>
                        <input type="text" name="address" value='.$address.'>
                    </div>
                    <div>
                        <label>Blood Group</label>
                        <input type="text" name="bloodgroup" value='.$bloodgroup.'>
                    </div>

                    <div>
                        <label> Mobile</label>
                        <input type="number" name="mobile" value='.$mobile.'>
                    </div>
                    <div>
                        <label> DOB</label>
                        <input type="text" name="dob" value='.$dob.'>
                    </div>
                    <div>
                        <label>Course name</label>
                        <select name="coursename" >
                        <option>'.$coursename.'</option>
                          '.$options.'
                        </select>
                    </div>
                    <div>
                        <label>Sem1</label>
                        <select name="sem1" >
                        <option>'.$sem1.'</option>
                        <option value="Yes" >Yes</option>
                        <option value="No" >No</option>
                        <option value="Return">Return</option>
                        </select>
                    </div>

                    <div>
                        <label>Sem2</label>
                        <select name="sem2" >
                        <option>'.$sem2.'</option>
                        <option value="Yes" >Yes</option>
                        <option value="No" >No</option>
                        <option value="Return">Return</option>
                        </select>
                    </div>

                    <div>
                        <label>Sem3</label>
                        <select name="sem3">
                        <option>'.$sem3.'</option>
                        <option value="Yes" >Yes</option>
                        <option value="No" >No</option>
                        <option value="Return">Return</option>
                        </select>
                    </div>

                    <div>
                        <label>Sem4</label>
                        <select name="sem4">
                        <option>'.$sem4.'</option>
                        <option value="Yes" >Yes</option>
                        <option value="No" >No</option>
                        <option value="Return">Return</option>
                        </select>
                    </div>

                    <div>
                        <label>Sem5</label>
                        <select name="sem5">
                        <option>'.$sem5.'</option>
                        <option value="Yes" >Yes</option>
                        <option value="No" >No</option>
                        <option value="Return">Return</option>
                        </select>
                    </div>

                    <div>
                        <label>Sem6</label>
                        <select name="sem6" >
                        <option>'.$sem6.'</option>
                        <option value="Yes" >Yes</option>
                        <option value="No" >No</option>
                        <option value="Return">Return</option>
                        </select>
                    </div>

                    <div>
                        <label>Sem7</label>
                        <select name="sem7">
                        <option>'.$sem7.'</option>
                        <option value="Yes" >Yes</option>
                        <option value="No" >No</option>
                        <option value="Return">Return</option>
                        </select>
                    </div>

                    <div>
                        <label>Sem8</label>
                        <select name="sem8" >
                        <option>'.$sem8.'</option>
                        <option value="Yes" >Yes</option>
                        <option value="No" >No</option>
                        <option value="Return">Return</option>
                        </select>
                    </div>

                    <div>
                        <label>Provisional</label>
                        <select name="provisional" >
                        <option>'.$provisional.'</option>
                        <option value="Yes" >Yes</option>
                        <option value="No" >No</option>
                        <option value="Return">Return</option>
                        </select>
                    </div>

                    <div>
                        <label>Consolidated</label>
                        <select name="consolidated">
                        <option>'.$consolidated.'</option>
                        <option value="Yes" >Yes</option>
                        <option value="No" >No</option>
                        <option value="Return">Return</option>
                        </select>
                    </div>

                    <div>
                        <label>Degree</label>
                        <select name="degree" >
                        <option>'.$degree.'</option>
                        <option value="Yes" >Yes</option>
                        <option value="No" >No</option>
                        <option value="Return">Return</option>
                        </select>
                    </div>
                    

                    
                    <div>
                        <input type="submit" style="margin-left:38%" class="btn btn-primary" name="update" value="Edit Student details">
                    </div>
                </form>
            </div>

            



    
    
';
}

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $rollnumber=$_POST['rollnumber'];
    $batchname=$_POST['batchname'];
    $mailid=$_POST['mailid'];
    $address=$_POST['address'];
    $bloodgroup=$_POST['bloodgroup'];
    $mobile=$_POST['mobile'];
    $dob=$_POST['dob'];
    $coursename=$_POST['coursename'];
    // $specialisation=$_POST['specialisation'];
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
    
    $q = "UPDATE addstudentdetails SET name='$name',rollnumber='$rollnumber',batchname='$batchname',mailid='$mailid',
    address='$address',bloodgroup='$bloodgroup',mobile='$mobile',dob='$dob',coursename='$coursename',
    sem1='$sem1',sem2='$sem2',sem3='$sem3',sem4='$sem4',sem5='$sem5',
    sem6='$sem6',sem7='$sem7',sem8='$sem8',provisional='$provisional',consolidated='$consolidated',degree='$degree'
     WHERE rollnumber = '$rollnumber'";
    $res = mysqli_query($data, $q);
    header('Location: editforstaff.php');
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

if(isset($_POST['edit_student']))
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
    width: 150%; /* Set the desired width of the table */
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
            <th>Sem1</th>
            <th>Sem2</th>
            <th>Sem3</th>
            <th>Sem4</th>
            <th>Sem5</th>
            <th>Sem6</th>
            <th>Sem7</th>
            <th>Sem8</th>
            <th>Provisional</th>
            <th>Consolidated</th>
            <th>Degree</th>
            <th>Action</th>
            
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
                <td><?php echo $row['sem1']; ?></td>
                <td><?php echo $row['sem2']; ?></td>
                <td><?php echo $row['sem3']; ?></td>
                <td><?php echo $row['sem4']; ?></td>
                <td><?php echo $row['sem5']; ?></td>
                <td><?php echo $row['sem6']; ?></td>
                <td><?php echo $row['sem7']; ?></td>
                <td><?php echo $row['sem8']; ?></td>
                <td><?php echo $row['provisional']; ?></td>
                <td><?php echo $row['consolidated']; ?></td>
                <td><?php echo $row['degree']; ?></td>
                <td><form method="post" action="">
                <input type="hidden" name="name" value="<?=$row['name']?>">
                <input type="hidden" name="rollnumber" value="<?=$row['rollnumber']?>">
                <input type="hidden" name="batchname" value="<?=$row['batchname']?>">
                <input type="hidden" name="mailid" value="<?=$row['mailid']?>">
                <input type="hidden" name="address" value="<?=$row['address']?>">
                <input type="hidden" name="bloodgroup" value="<?=$row['bloodgroup']?>">
                <input type="hidden" name="mobile" value="<?=$row['mobile']?>">
                <input type="hidden" name="dob" value="<?=$row['dob']?>">
                <input type="hidden" name="coursename" value="<?=$row['coursename']?>">
                <input type="hidden" name="sem1" value="<?=$row['sem1']?>">
                <input type="hidden" name="sem2" value="<?=$row['sem2']?>">
                <input type="hidden" name="sem3" value="<?=$row['sem3']?>">
                <input type="hidden" name="sem4" value="<?=$row['sem4']?>">
                <input type="hidden" name="sem5" value="<?=$row['sem5']?>">
                <input type="hidden" name="sem6" value="<?=$row['sem6']?>">
                <input type="hidden" name="sem7" value="<?=$row['sem7']?>">
                <input type="hidden" name="sem8" value="<?=$row['sem8']?>">
                <input type="hidden" name="provisional" value="<?=$row['provisional']?>">
                <input type="hidden" name="consolidated" value="<?=$row['consolidated']?>">
                <input type="hidden" name="degree" value="<?=$row['degree']?>">
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




