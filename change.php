<?php
error_reporting(0);
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "p1";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if($conn){
   // echo "Connection Successfully";
}
else{
    echo "Connection Unsuccessfull" . mysqli_connect_error();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Form</title>

</head>
<body>
    <div class="container">
        <form action="#" method="POST">
        <div class="title">
            Change Password
        </div>
        <?php if(isset($_GET['error'])){ ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <?php if(isset($_GET['success'])){ ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
            <?php } ?>
        <div class="form">
        <div class="input_field">
        <label>Old Password</label>
                <input type="password" class="input" name="opassword">
</div>
<div class="input_field">
                <label>New Password</label>
                <input type="password" class="input" name="npassword">
            </div>
            <div class="input_field">
                <label>Confirm Password</label>
                <input type="password" class="input" name="cpassword">
            </div>
            <div class="input_field">
                <input type="submit" value="Change Password" class="btn" name="update">
            </div>
        </div>
</form>
    </div>
</body>
</html>

<?php

if(isset($_POST['update'])){
$opassword = md5($_POST['opassword']);
$npassword = $_POST['npassword'];
$cpassword = $_POST['cpassword'];

if($opassword!='' &&  $npassword!='' && $cpassword !='' && ($cpassword==$npassword))
{
  $id = $_SESSION['id'];
    $sql = "SELECT * FROM registration1 WHERE id='$id' AND password = '$opassword'";

  
      $result=mysqli_query($conn,$sql);
    $present=mysqli_num_rows($result);


   if($present>0){
     $hashed_new_password = md5($npassword);
    
    $query = "UPDATE registration1 SET password = '$hashed_new_password' where id ='$id'";
    $data = mysqli_query($conn,$query);

     if($data){
        echo "<script>alert(' password
        update ')</script>";
         ?>
      <meta http-equiv = "refresh" content = "0; url = http://localhost/p1/c.php"/>

       <?php 
     }
     else{
      echo "Error updating password: " . mysqli_error($conn);
     }
      
} else {
    //echo "Incorrect cp.";
}

    }
    else {
    echo "New password and confirm password do not match.";
    }
}

?>