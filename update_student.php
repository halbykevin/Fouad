<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $started_since = $_POST['started_since'];
    $current_level = $_POST['current_level'];
    $current_skill = $_POST['current_skill'];
    $book = $_POST['book'];
    $current_song = $_POST['current_song'];

    $sql = "UPDATE students SET 
            first_name='$first_name', 
            last_name='$last_name', 
            started_since='$started_since', 
            current_level='$current_level', 
            current_skill='$current_skill', 
            book='$book', 
            current_song='$current_song' 
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Student updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    header("Location: index.php");
    exit();
}

$conn->close();
?>
