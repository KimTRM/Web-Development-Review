<?php
include "connect.php"; // Include the database connection

if (!isset($_GET['table'], $_GET['field'])) {
    exit(json_encode(["error" => "Missing table or field parameters"]));
}

$table = $_GET['table'];
$field = $_GET['field'];

$query = "SELECT DISTINCT `$field` FROM `$table`";
$result = mysqli_query($conn, $query) 
        or exit(json_encode(["error" => mysqli_error($conn)]));

$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo json_encode($data);
?>