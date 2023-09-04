<?PHP
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "p1";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $query3 = mysqli_query($conn,"SELECT * FROM states where country_id='$id' ");
    while($row = mysqli_fetch_array($query3)){
        $id = $row['id'];
        $state = $row['name'];
        echo "<option value='$id'>$state</option>";
    }
}
?>