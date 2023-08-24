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
   
   if(isset($_POST['add_courses']))
   {
    $user_course_code=$_POST['course_code'];
    $user_course_name=$_POST['course_name'];
    $user_teacher_initial=$_POST['teacher_initial'];


    
    
        $sql ="INSERT INTO courses(course_code,course_name,teacher_initial) 
        VALUES('$user_course_code','$user_course_name','$user_teacher_initial')";
        $result=mysqli_query($data,$sql);
    


        
   }
   
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Courses </title>

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
        <h1>Add Course </h1>
        <div class="div">
        <form action="#" method="POST">
            <div>
                <label>Course Name</label>
                <input type="text" name="course_name">
            </div>
            <div>
                <label>Course Code</label>
                <input type="text" name="course_code">
            </div>
            <div>
                <label>Teacher Initial</label>
                <input type="text" name="teacher_initial">
            </div>

            <div>

                <input type="submit" class="btn btn-primary" name="add_courses" value="Add Course">
            
            </div>

            
        </form>
        </div>
        </center>
    </div>


	

</body>
</html>