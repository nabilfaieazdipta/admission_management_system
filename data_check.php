<?php
session_start();
$host = "localhost";  
$user = "root";    
$password = "";    
$db = "uni_management_system";  


$data =  mysqli_connect($host, $user, $password, $db);


if ($data===false) 
{
    die("Connection error " );
}

if (isset($_POST['apply'])) 
{
    $data_name=$_POST['name'];
    $data_email=$_POST['email'];
    $data_phone=$_POST['phone'];
    $data_subject=$_POST['subject'];
    $data_nid=$_POST['nid'];
    
    $sql = "INSERT INTO admission_form(name,email,phone,subject,nid) 
          VALUES ('$data_name','$data_email','$data_phone','$data_subject','$data_nid')";
    
    $result = mysqli_query($data,$sql);
    
    if($result)
    {
      $_SESSION['message']= "Your application successful";
      header("location:admission_form.php");
    }
    else
    {
       echo "Apply Failed";
    }
}   


?>