<?php
session_start();
?>
<html>
    <head>
        <title>Display</title>
        <style>
            body{
                background-color: pink;
            }
            .update, .delete, .add, .change{
                background-color: black;
                color: white;
                border: 0;
                outline: none;
                border-radius: 5px;
                height: 35px;
                width: 80px;
                font-weight: bold;
                cursor: pointer;
            } 
            .add{
                position: relative;
                bottom: 32px;
                left: 100px;
                margin: 20px;
                padding: 10px;
                text-decoration: none;
            }
            .change{ 
                position: relative;
                left: 75%;
                bottom: 32px;
                margin: 20px;
                padding: 10px;
                text-decoration: none;
            }
        </style>
    </head>
</html>
<?php
include("conn.php");
error_reporting(0);

$userprofile = $_SESSION['email'];

if($userprofile == true){

}
else{
    header('location:login.php');
}

$query = "SELECT * FROM registration1";

//For Execute
$data = mysqli_query($conn,$query);

//Count line of data
$total = mysqli_num_rows($data);


//echo $total;

if($total > 0){
    ?>
    <h2 align=center>Display All Records</h2>
    <a href="a.php" class='add'>Add</a>
    <a href="change.php?id=$result[id]" class="change">Change Password</a>
    <center><table border="2px" cellspacing="7" width="100%">
        <tr>
        <th width="3%">Id</th>
        <th width="3%">Image</th>
        <th width="6%">College</th>
        <th width="6%">Name</th>
        <th width="6%">Course</th>
        <th width="7%">Caste</th>
        <th width="14%">Languages</th>
        <th width="9%">Country</th>
        <th width="9%">State</th>
        <th width="14%">Email</th>
        <th width="13%">Operations</th>
        </tr>
    <?php
    while($result = mysqli_fetch_assoc($data)){
        echo "<tr>
        <td>". "$result[id]" ."</td>
        <td><img src= '". "$result[std_image]" ."' height='100px' width='100px'></td>
        <td>". "$result[college]" ."</td>
        <td>". "$result[name]" ."</td>
        <td>". "$result[course]" ."</td>
        <td>". "$result[caste]" ."</td>
        <td>". "$result[language]" ."</td>
        <td>". "$result[country]" ."</td>
        <td>". "$result[state]" ."</td>
        <td>". "$result[email]" ."</td>
        <td><a href='update.php?id=$result[id]'><input type='submit' value='Update' class='update'></a>
        <a href='delete.php?id=$result[id]'><input type='submit' value='Delete' class='delete'></a></td>
        </tr>";
    }
}
else{
    echo "Not Record Found";
}
?>
    </table>
<a href="logout.php"><input type="submit" name="" value="LogOut" style="background:#4ba6b6; color:white; height:35px; width=100px; margin-top: 20px; font-size: 18px; border: 0; border-radius: 5px; cursor: pointer; "></a>
</center>