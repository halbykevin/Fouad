<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $started_since = $_POST['started_since'];
    $current_level = $_POST['current_level'];
    $current_skill = $_POST['current_skill'];
    $book = $_POST['book'];
    $current_song = $_POST['current_song'];

    $sql = "INSERT INTO students (first_name, last_name, started_since, current_level, current_skill, book, current_song)
            VALUES ('$first_name', '$last_name', '$started_since', '$current_level', '$current_skill', '$book', '$current_song')";

    if ($conn->query($sql) === TRUE) {
        echo "New student added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
