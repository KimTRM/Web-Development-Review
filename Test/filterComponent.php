<?php
include "connect.php";

$table = $_POST['table'];
$field = $_POST['field'];
$filterField = $_POST['filterField'];
$filterValue = $_POST['filterValue'];

$query = "SELECT DISTINCT `$field` FROM `$table`";
if ($filterField && $filterValue) $query .= " WHERE `$filterField` = '$filterValue'";

$result = mysqli_query($conn, $query);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo json_encode($data);
?>