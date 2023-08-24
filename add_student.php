<?php
session_start();
   if(!isset($_SESSION['username']))
   {
    header("location:login.php");
   }
   elseif($_SESSION['usertype']=='student')
   {
    header("location:login.php");
   }

   $host = "localhost";  
   $user = "root";    
   $password = "";    
   $db = "uni_management_system";
   
   $data = mysqli_connect($host, $user, $password, $db);
   
   if(isset($_POST['add_student']))
   {
    $username=$_POST['name'];
    $user_email=$_POST['email'];
    $user_phone=$_POST['phone'];
    $user_subject=$_POST['subject'];
    $user_password=$_POST['password'];
    $usertype= "student";
    
    $check="SELECT * FROM user WHERE email='$user_email'";
    $check_user=mysqli_query($data,$check);
    
    $row_count=mysqli_num_rows($check_user);
    
    if($row_count==1)
    {
        echo "<script type='text/javascript'> alert('Useremail Already Exists . Try Another One')</script";
    
    }

    else{
        $sql ="INSERT INTO user(name,email,usertype,phone,password,subject) 
        VALUES('$username','$user_email','$usertype','$user_phone','$user_password','$user_subject')";
        $result=mysqli_query($data,$sql);
    
        $zsql ="INSERT INTO student(name,g_suite_email,phone,password,subject) 
        VALUES('$username','$user_email','$user_phone','$user_password','$user_subject')";
        $result=mysqli_query($data,$zsql);

        $ksql ="INSERT INTO students_final_list(name,email,phone,subject) 
        VALUES('$username','$user_email','$user_phone','$user_subject')";
        $result=mysqli_query($data,$ksql);

        if($result)
        {
        echo "<script type='text/javascript'> alert('Data Uploaded Successfully')</script";
        }

        elseif($result)
        {
        echo "<script type='text/javascript'> alert('Data Uploaded Successfully')</script";
        }
   }
   }
   
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Students Dashboard </title>

	<link rel="stylesheet" type="text/css" href="admin.css">

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

      <style type="text/css">
        label 
        {
          display: inline-block;
          text-align: right;
          width: 100px;
          padding-top:10px;
          padding-bottom:10px;

        }

        .div 
        {
         background-color: skyblue;
         width:  400px ;
         padding-top: 70px;
         padding-bottom:70px;

        }
      </style> 
</head>
<body>

    <?php
    include 'admin_sidebar.php';
    ?>

    <div class='content'>
        <center>
        <h1>Add Student </h1>
        <div class="div">
        <form action="#" method="POST">
            <div>
                <label>Name</label>
                <input type="text" name="name">
            </div>
            <div>
                <label>Email</label>
                <input type="email" name="email">
            </div>
            <div>
                <label>Phone</label>
                <input type="number" name="phone">
            </div>
            <div>
                <label>Subject</label>
                <input type="text" name="subject">
            </div>
            <div>
                <label>Password</label>
                <input type="text" name="password">
            </div>
            <div>

                <input type="submit" class="btn btn-primary" name="add_student" value="Add Student">
            
            </div>

            
        </form>
        </div>
        </center>
    </div>


	

</body>
</html>