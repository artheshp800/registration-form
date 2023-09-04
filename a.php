<?php include("conn.php"); 
//error_reporting(0);
//$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Form</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <form action="#" method="POST" enctype="multipart/form-data">
        <div class="title">
            Registration Form
        </div>
        <div class="form">
        <div class="input_field">
                <label>Image</label>
                <input type="file" name="uploadfile" style="width: 100%;">
            </div>
            <div class="input_field">
                <label>College</label>
                <input type="text" class="input" name="college" required>
            </div>
            <div class="input_field">
                <label>Name</label>
                <input type="text" class="input" name="name" required>
            </div>
            <div class="input_field">
                <label>Course</label>
                <input type="text" class="input" name="course" required>
            </div>
            <div class="input_field" required>
                <label style="margin-right:100px";>Caste</label>
                <input type="radio" name="caste" value="General"><label style="margin-left:5px;">General</label>
                <input type="radio" name="caste" value="OBC"><label style="margin-left:5px;">OBC</label>
                <input type="radio" name="caste" value="SC"><label style="margin-left:5px;">SC</label>
                <input type="radio" name="caste" value="ST"><label style="margin-left:5px;">ST</label>
            </div>
            <div class="input_field" required>
                <label style="margin-right:100px";>Languages</label>
                <input type="checkbox" name="language[]" value="Hindi"><label style="margin-left:5px;">Hindi</label>
                <input type="checkbox" name="language[]" value="English"><label style="margin-left:5px;">English</label>
                <input type="checkbox" name="language[]" value="Marwadi"><label style="margin-left:5px;">Marwadi</label>
            </div>
            <div class="input_field">
                <label>Select Country</label>
                <select name="country" id = "country">
                    <option>Select</option>
                    <?php 
                    $query3 = mysqli_query($conn,"SELECT * FROM countries");
                    while($row=mysqli_fetch_array($query3)){
                        ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['country_name'] ?></option>
                    
                    <?php
                    }
                    ?>
                </select>
                </div>
                <div class="input_field">
                <label>Select State</label>
                <select name="state" id = "state">
                    <option>Select</option>
                </select>
                </div>
            <div class="input_field" required>
                <label>E-mail</label>
                <input type="email" class="input" name="email">
            </div>
            <div class="input_field">
                <label>Password</label>
                <input type="password" class="input" name="password" required>
            </div>
            <div class="input_field">
                <input type="submit" value="register" class="btn" name="register">
            </div>
        </div>
</form>
    </div>
</body>
<script>
    $(document).ready(function(){
$("#country").on('change',function(){
    var countryId = $(this).val();
    $.ajax({
        method:"POST",
        url:"ajax.php",
        data:{id:countryId},
        dataType:"html",
        success:function(data){
            $("#state").html(data);
        }
    })
});
});
</script>
</html>

<?php
    if($_POST['register'])
    {
        
        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "images/". $filename;
        move_uploaded_file($tempname, $folder);



        $college = $_POST['college'];
        $name = $_POST['name'];
        $course = $_POST['course'];
        $caste = $_POST['caste'];
        $lang = $_POST['language'];
        $lang1 = implode(",",$lang);
        $country = $_POST['country'];
        $state = $_POST['state'];
        $email = $_POST['email'];
        $pwd = md5($_POST['password']);
        
        //Convert array into String
        
    
            if($folder != "" && $college != "" && $name !="" && $course !="" && $caste !="" && $lang !="" && $country !="" && $state !="" && $email !="" && $pwd !=""){
        
                $sql="SELECT * FROM registration1 where email='$email'";
                $result = mysqli_query($conn,$sql);
                $present = mysqli_num_rows($result);
                if($present>0){
                    echo "<script>alert('User already exits')</script>";
                }
                else{
                    $query = "INSERT INTO registration1(`std_image`,`college`,`name`,`course`,`caste`,`language`,`country`,`state`,`email`,`password`) VALUES('$folder','$college','$name','$course','$caste','$lang1','$country','$state','$email','$pwd')";
                    $data = mysqli_query($conn,$query);
                }

                if($data)
                {
                    echo "Data Inserted Successfully";
                }
                else{
                    echo "Failed";
                }
            }  
    }    
?>