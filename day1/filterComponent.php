<?php
include "connect.php";

if (!isset($_POST['table'], $_POST['field'])) {
    exit(json_encode(["error" => "Missing table or field parameters"]));
}

$table = $_POST['table'];
$field = $_POST['field'];

$query = "SELECT DISTINCT `$field` FROM `$table`";
$result = mysqli_query($conn, $query) or exit(json_encode(["error" => mysqli_error($conn)]));

$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo json_encode($data);
?>