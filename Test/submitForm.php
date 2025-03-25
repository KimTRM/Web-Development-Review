<?php
include "connect.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") exit("Invalid request.");

$requiredFields = ['School', 'Track', 'Strand', 'LRN', 'Name', 'Age', 'Gender', 'Religion'];

foreach ($requiredFields as $field) {
    if (empty($_POST[$field]) || $_POST[$field] === "Select") {
        exit("Error: $field is required.");
    }
}

$query = "INSERT INTO students (School, Track, Strand, LRN, Name, Age, Gender, Religion) 
        VALUES ('{$_POST['School']}', '{$_POST['Track']}', '{$_POST['Strand']}', 
                '{$_POST['LRN']}', '{$_POST['Name']}', '{$_POST['Age']}', 
                '{$_POST['Gender']}', '{$_POST['Religion']}')";

echo mysqli_query($conn, $query) ? "Saved successfully!" : "Error: " . mysqli_error($conn);
?>
