<?php
$host="localhost";
$user="root";
$password="";
$db="COE";

$data=mysqli_connect($host,$user,$password,$db);

if($data===false)
{
    die("connection error");
}

if(isset($_POST['submit']))
{
    $id=$_POST['id'];
    $data_name=$_POST['name'];
    $mailid=$_POST['mailid'];
    $mobile=$_POST['mobile'];
    $department=$_POST['department'];

    $sql="INSERT INTO staff(id, name,email,mobile,department) VALUES ('$id','$name','$mailid','$mobile','$department')";

    $result=mysqli_query($data,$sql);

    if($result)
    {
        echo "Added successfully";

    }
    else
    {
        echo "Failure";
    }
}



?>