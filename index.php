<?php
include 'db_connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Student Management</h1>
    <button id="addStudentBtn" class="styled-button">Add Student</button>
    <button id="editStudentsBtn" class="styled-button">Edit Students</button>

    <!-- Add Student Modal -->
    <div id="addStudentModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Add New Student</h2>
            <form action="add_student.php" method="post">
                <label for="first_name">First Name:</label><br>
                <input type="text" id="first_name" name="first_name" required><br><br>

                <label for="last_name">Last Name:</label><br>
                <input type="text" id="last_name" name="last_name" required><br><br>

                <label for="started_since">Started Since:</label><br>
                <input type="date" id="started_since" name="started_since" required><br><br>

                <label for="current_level">Current Level:</label><br>
                <input type="text" id="current_level" name="current_level"><br><br>

                <label for="current_skill">Current Skill:</label><br>
                <input type="text" id="current_skill" name="current_skill"><br><br>

                <label for="book">Current Book:</label><br>
                <input type="text" id="book" name="book"><br><br>

                <label for="current_song">Current Song:</label><br>
                <input type="text" id="current_song" name="current_song"><br><br>

                <input type="submit" value="Add Student" class="styled-submit-button">
            </form>
        </div>
    </div>

    <script>
        // Get the modals
        var addModal = document.getElementById("addStudentModal");

        // Get the buttons that open the modals
        var addBtn = document.getElementById("addStudentBtn");
        var editBtn = document.getElementById("editStudentsBtn");

        // Get the <span> elements that close the modals
        var spans = document.getElementsByClassName("close");

        // When the user clicks the button, open the add modal 
        addBtn.onclick = function() {
            addModal.style.display = "block";
        }

        // When the user clicks the edit button, redirect to editStudents.php
        editBtn.onclick = function() {
            window.location.href = 'editStudents.php';
        }

        // When the user clicks on <span> (x), close the modal
        for (var i = 0; i < spans.length; i++) {
            spans[i].onclick = function() {
                addModal.style.display = "none";
            }
        }

        // When the user clicks anywhere outside of the modals, close them
        window.onclick = function(event) {
            if (event.target == addModal) {
                addModal.style.display = "none";
            }
        }
    </script>
</body>
</html>
