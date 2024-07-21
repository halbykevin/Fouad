<?php
include 'db_connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM students WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();
    } else {
        echo "Student not found.";
        exit();
    }
} else {
    echo "No student ID provided.";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Diagrams</title>
    <link rel="stylesheet" href="stylesDiagrams.css">
</head>
<body>
    <h1>Diagrams for <?php echo $student['first_name'] . ' ' . $student['last_name']; ?></h1>
    <button onclick="window.location.href='diagrams.php'" class="styled-button">Back</button>
    
    <!-- Display diagrams for the student -->
    <!-- You can add your diagram generation and display logic here -->
    
</body>
</html>
