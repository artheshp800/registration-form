<?php
include("conn.php");
$query = "INSERT INTO registration1 VALUES ('PIET','Ram','BCA','ansh@gmail.com', '12345')";
$data = mysqli_query($conn, $query);

if($data)
{
    echo "Data inserted into Database";
}

?>