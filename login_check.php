<?php
error_reporting(0);
session_start();
$host="localhost";
$user="root";
$password="";
$db="uni_management_system";
$data=mysqli_connect($host,$user,$password,$db);

if($data===false)
{
    die("connection error");
}
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $name = $_POST['username'];
        $pass = $_POST['password'];

        $sql="select * from user where email='".$name."' AND password='".$pass."' "; 
        $result= mysqli_query($data,$sql);
        $row= mysqli_fetch_array($result);

        if($row["usertype"]=="student")

        {
            $_SESSION["username"]=$name;
			$_SESSION["usertype"]="student";
            header("location:student.php");


        }
        elseif($row["usertype"]=="admin")

        {
			$_SESSION["username"]=$name;
			$_SESSION["usertype"]="admin";
            header("location:administrator.php");


        }

        elseif($row["usertype"]=="teacher")

        {
			$_SESSION["username"]=$name;
			$_SESSION["usertype"]="teacher";
            header("location:teacher.php");


        }
        
        else
        {
         
            $massage= "username or password do not match";
            $_SESSION['loginMassage']=$massage;
            header("location:login.php");



        }

    }




?>
