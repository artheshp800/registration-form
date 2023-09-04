<?php 
include("conn.php");
session_start();
error_reporting(0);
$code = rand(999999, 111111);
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    if($email != ""){
                $subject = "Email Verification Code";
                $message = "Your verification code is $code";
                $sender = "From: mailto:adityajain@gmail.com";
                mail($email, $subject, $message, $sender);
        }}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
</head>
<body>
    <h1>Forgot Password</h1>
    <form method="post" action="#">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <input type="submit" value="Send otp" name="submit">
    </form>
</body>
</html>
<?php

?>