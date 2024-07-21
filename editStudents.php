<?php
include 'db_connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Students</title>
    <link rel="stylesheet" href="stylesEdit.css">
</head>
<body>
    <h1>Edit Students</h1>
    <button onclick="window.location.href='index.php'" class="styled-button">Back</button>
    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Started Since</th>
            <th>Current Level</th>
            <th>Current Skill</th>
            <th>Book</th>
            <th>Current Song</th>
            <th>Actions</th>
        </tr>
        <?php
        $sql = "SELECT * FROM students";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row['first_name'] . "</td>
                    <td>" . $row['last_name'] . "</td>
                    <td>" . $row['started_since'] . "</td>
                    <td>" . $row['current_level'] . "</td>
                    <td>" . $row['current_skill'] . "</td>
                    <td>" . $row['book'] . "</td>
                    <td>" . $row['current_song'] . "</td>
                    <td>
                        <button class='editButton styled-button' data-id='" . $row['id'] . "'>Edit</button>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No students found</td></tr>";
        }

        $conn->close();
        ?>
    </table>

    <!-- Edit Student Modal -->
    <div id="editStudentModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Edit Student</h2>
            <form id="editStudentForm" action="update_student.php" method="post">
                <input type="hidden" id="edit_student_id" name="id">
                
                <label for="edit_first_name">First Name:</label><br>
                <input type="text" id="edit_first_name" name="first_name" required><br><br>

                <label for="edit_last_name">Last Name:</label><br>
                <input type="text" id="edit_last_name" name="last_name" required><br><br>

                <label for="edit_started_since">Started Since:</label><br>
                <input type="date" id="edit_started_since" name="started_since" required><br><br>

                <label for="edit_current_level">Current Level:</label><br>
                <input type="text" id="edit_current_level" name="current_level"><br><br>

                <label for="edit_current_skill">Current Skill:</label><br>
                <input type="text" id="edit_current_skill" name="current_skill"><br><br>

                <label for="edit_book">Current Book:</label><br>
                <input type="text" id="edit_book" name="book"><br><br>

                <label for="edit_current_song">Current Song:</label><br>
                <input type="text" id="edit_current_song" name="current_song"><br><br>

                <input type="submit" value="Update Student" class="styled-submit-button">
            </form>
        </div>
    </div>

    <script>
        // Get the modal
        var editModal = document.getElementById("editStudentModal");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            editModal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == editModal) {
                editModal.style.display = "none";
            }
        }

        // Handle edit button clicks
        var editButtons = document.getElementsByClassName("editButton");
        for (var i = 0; i < editButtons.length; i++) {
            editButtons[i].onclick = function() {
                var studentId = this.getAttribute("data-id");
                
                // Fetch student data using AJAX
                fetch('get_student.php?id=' + studentId)
                .then(response => response.json())
                .then(data => {
                    document.getElementById("edit_student_id").value = data.id;
                    document.getElementById("edit_first_name").value = data.first_name;
                    document.getElementById("edit_last_name").value = data.last_name;
                    document.getElementById("edit_started_since").value = data.started_since;
                    document.getElementById("edit_current_level").value = data.current_level;
                    document.getElementById("edit_current_skill").value = data.current_skill;
                    document.getElementById("edit_book").value = data.book;
                    document.getElementById("edit_current_song").value = data.current_song;
                    
                    editModal.style.display = "block";
                });
            }
        }
    </script>
</body>
</html>
