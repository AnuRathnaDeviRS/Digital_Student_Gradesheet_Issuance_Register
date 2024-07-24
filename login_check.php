<?php
error_reporting(0);
session_start();
$host="localhost";
$user="root";
$password="";
$db="COE";

$data=mysqli_connect($host,$user,$password,$db);

if($data===false)
{
    die("connection error");
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $name=$_POST['username'];
    $password=$_POST['password'];

    $sql="select * from user where username='".$name."' AND '".$password."'";

    $result=mysqli_query($data,$sql);

    $row=mysqli_fetch_array($result);


    if($row["usertype"]=="student")
    {
        $_SESSION['username']=$name;
        $_SESSION['usertype']="student";
        header("location:studenthome.php");
    }

    else if($row["usertype"]=="admin")
    {
        $_SESSION['username']=$name;
        $_SESSION['usertype']="admin";
        header("location:adminhome.php");
    }
    else if($row["usertype"]=="staff")
    {
        $_SESSION['username']=$name;
        $_SESSION['usertype']="staff";
        header("location:staffhome.php");
    }

    else{
        session_start();
        $message="username or password do not match";
        $_SESSION['loginMessage']=$message;
        header("location:index.php");
    }
}
?>