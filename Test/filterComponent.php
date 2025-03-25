<?php
include "connect.php";

$table = $_POST['table'] ?? '';
$field = $_POST['field'] ?? '';
$filterField = $_POST['filterField'] ?? '';
$filterValue = $_POST['filterValue'] ?? '';

if (!$table || !$field) exit(json_encode(["error" => "Missing parameters"]));

$query = "SELECT DISTINCT `$field` FROM `$table`";
if ($filterField && $filterValue) $query .= " WHERE `$filterField` = '$filterValue'";

$result = mysqli_query($conn, $query) or exit(json_encode(["error" => mysqli_error($conn)]));
echo json_encode(mysqli_fetch_all($result, MYSQLI_ASSOC));
?>