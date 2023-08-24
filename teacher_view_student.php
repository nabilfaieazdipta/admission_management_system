
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
   elseif($_SESSION['usertype']=='admin')
   {
    header("location:login.php");
   }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Teacher Dashboard </title>

	<link rel="stylesheet" type="text/css" href="admin.css">

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    <?php
    include 'teacher_sidebar.php';
    ?>
    
<?php
    $host = "localhost";  
    $user = "root";    
    $password = "";    
    $db = "uni_management_system";
    
    $data = mysqli_connect($host, $user, $password, $db);

    $sql="SELECT * from user WHERE usertype='student' ";
    $result=mysqli_query($data,$sql);
?>    
    <div class="content">
        <center>
        <h1>Students</h1>
        <table border="1px">
        <tr>
            <th class="table_th">g_suite_id</th>
            <th class="table_th">name</th>
            <th class="table_th">subject</th>
            
            <th class="table_th">phone_no</th>
        </tr>

        <?php
                while($info=$result->fetch_assoc())
                {
                ?>
                <tr>
                 <td style="padding: 20px;">     
                 <?php 
                  echo "{$info['email']}";
                 ?>
                 </td>
                 <td style="padding: 20px;">         
                 <?php 
                  echo "{$info['Name']}";
                 ?>
                 </td>
                 <td style="padding: 20px;">
                 <?php 
                  echo "{$info['Subject']}";
                 ?>
                 </td>
                 
                 <td style="padding: 20px;">
                 <?php 
                  echo "{$info['phone']}";
                 ?>
                 </td>
                </tr>
        <?php
        }
        
        ?>
        </table>
    </center>
    </div>

	

</body>
</html>