<?php
include("conn.php");
$id = $_GET['id'];
$query = "DELETE FROM registration1 WHERE id='$id'";
$data = mysqli_query($conn,$query);
if($data)
{
    echo "<script>alert('Record Deleted')</script>";
    ?>
    <META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/p1/c.php">
<?php
}
else
{
    echo "<font color='red'>Sorry, Delete process failed";
}
?>