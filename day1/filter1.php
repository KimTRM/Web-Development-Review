<?php
include "connect.php";

$query = "SELECT distinct School FROM sheet2";
$result = mysqli_query($conn, $query);

$rec = array();

while($row = mysqli_fetch_array($result))
{
    array_push($rec,$row);
}
echo json_encode($rec);
?>