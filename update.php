<?php include("conn.php"); 
error_reporting(0);
$id = $_GET['id'];

$query = "SELECT * FROM registration1 where id= '$id'";

//For Execute
$data = mysqli_query($conn,$query);
$result = mysqli_fetch_assoc($data);

$language = $result['language'];
$language1 = explode(",",$language);
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
            Update Details
        </div>
        <div class="form">
        <div class="input_field">
                <label>Image</label>
                <input type="file" name="std_image" class="form-control" style="width:100%;">                
                <img src="<?php echo $result['std_image']; ?>" alt='User Image' width='100'>

                <input type="hidden" name="old_image" value="<?php echo $result['std_image']; ?>">
            </div>
            <div class="input_field">
            <label>College</label>
                 <input type="text" class="input"  value="<?php echo "$result[college]" ?>"  name="college" required>
            </div>
            <div class="input_field">
                <label>Name</label>
                <input type="text" name="name" value="<?php echo "$result[name]" ?>" required>
            </div>
            <div class="input_field">
                <label>Course</label>
                <input type="text" name="course" value="<?php echo "$result[course]" ?>" required>
                </div>
                <div class="input_field" required>
                <label style="margin-right:40px";>Caste</label>
                <input type="radio" name="caste" value="General"
                <?php
                if($result['caste'] == "General"){
                    echo "checked";
                }
                 ?>>
                <label style="margin-left:5px;">General</label>
                <input type="radio" name="caste" value="OBC"
                <?php
                if($result['caste'] == "OBC"){
                    echo "checked";
                }
                 ?>
                >
                <label style="margin-left:5px;">OBC</label>
                <input type="radio" name="caste" value="SC"
                <?php
                if($result['caste'] == "SC"){
                    echo "checked";
                }
                 ?>
                ><label style="margin-left:5px;">SC</label>
                <input type="radio" name="caste" value="ST"
                <?php
                if($result['caste'] == "ST"){
                    echo "checked";
                }
                 ?>
                ><label style="margin-left:5px;">ST</label>
            </div>
            <div class="input_field" required>
                <label style="margin-right:10px";>Languages</label>
                <input type="checkbox" name="language[]" value="Hindi"
                <?php
                    if(in_array('Hindi', $language1)){
                        echo "checked";
                    }
                ?>>
                <label style="margin-left:5px;">Hindi</label>

                <input type="checkbox" name="language[]" value="English"
                <?php
                    if(in_array('English', $language1)){
                        echo "checked";
                    }
                ?>>
                <label style="margin-left:5px;">English</label>

                <input type="checkbox" name="language[]" value="Marwadi"
                <?php
                    if(in_array('Marwadi', $language1)){
                        echo "checked";
                    }
                ?>>
                <label style="margin-left:5px;">Marwadi</label>
            </div>

                <div class="input_field">
                <label>Select Country</label>
                <select name="country" id ="country">
                    <option>Select</option>
                    <?php 
                    $query3 = mysqli_query($conn,"SELECT * FROM countries");
                    while($row=mysqli_fetch_array($query3)){
                        ?>
                        <option value="<?php echo $row['id']; ?>"<?php if($row['id']==$result['country']){ ?>Selected <?php }?>><?php echo $row['country_name'] ?></option>
                    
                    
                    <?php
                    }
                    ?>
                </select>
                </div>
                <div class="input_field">
                <label>Select State</label>
                <select name="state" id ="state">
                    <option>Select</option>
                    <?php
                    $query4 = mysqli_query($conn,"SELECT * FROM states WHERE country_id = $result[country]");
                    while($states=mysqli_fetch_array($query4)){
                        ?>
                    <option value="<?php echo $states['id']; ?>" <?php if($states['id'] ==$result['state']){ ?> Selected <?php } ?>><?php echo $states['name']; ?> </option>
                    <?php
                    }
                    ?>
                </select>
                </div>


            <div class="input_field" required>
                <label>E-mail</label>
                <input type="email" class="input" value="<?php echo "$result[email]" ?>" name="email">
            </div>
            
            <div class="input_field">
                <input type="submit" value="Update" class="btn" name="update">
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
    if(isset($_POST['update']))
    {   
        $folder = $_POST['old_image'];
        if(isset($_FILES["std_image"]["name"]) && $_FILES["std_image"]["name"]!='' )
        {
            $filename = $_FILES["std_image"]["name"];
            $tempname = $_FILES["std_image"]["tmp_name"];
            $folder = "images/".$filename;
            move_uploaded_file($tempname, $folder);
        }
       
        
        //echo "<img src = '$folder' height='100px'weight='100px'>";

        $college = $_POST['college'];
        $name = $_POST['name'];
        
        $course = $_POST['course'];
        $caste = $_POST['caste'];
        $language = $_POST['language'];
        $country = $_POST['country'];
        $state = $_POST['state'];
        $email = $_POST['email'];

        //Convert array into String
        $language1 = implode(",",$language);

        
        
            if($college != "" && $name !="" && $course !="" && $caste !="" && $language !="" && $email !=""){

                $checkquery="SELECT * FROM registration1 WHERE email='$email' AND id !='$id'";
                $result = mysqli_query($conn,$checkquery);
                $present = mysqli_num_rows($result);
                if($present>0){
                    echo "<script>alert('User already exits')</script>";
                }
                else{
                   
                    $query = "UPDATE registration1 SET std_image= '$folder',college='$college',name='$name',course='$course',caste='$caste',language='$language1',country='$country',state='$state',email='$email'where id= '$id'";
                    $data = mysqli_query($conn,$query);
                    



                   /* $query = "UPDATE registration1 SET std_image=?, college=?, name=?, course=?, caste=?, language=?, country=?, state=?, email=? WHERE id=?";
                    $stmt = mysqli_prepare($conn, $query);
                    mysqli_stmt_bind_param($stmt, "sssssssssi", $folder, $college, $name, $course, $caste, $language1, $country, $state, $email, $id);
                    $success = mysqli_stmt_execute($stmt);
                    mysqli_stmt_close($stmt);

                    if ($success) {
                    // ...
                }
*/
                }

                if($data){
                    echo "Data Inserted Successfully";
                }
                else{
                    //echo "Failed";
                }

        if($data){
            //echo "<script>alert('Record Updated')</script>";
            ?>
                <meta http-equiv="refresh" content= "0; url = http://localhost/p1/c.php"/>
            <?php
        }
    
    }
}
?>