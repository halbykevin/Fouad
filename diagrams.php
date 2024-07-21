<?php
include 'db_connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Diagrams</title>
    <link rel="stylesheet" href="stylesDiagrams.css">
</head>
<body>
    <h1>View Diagrams</h1>
    <button onclick="window.location.href='index.php'" class="styled-button">Back</button>
    
    <input type="text" id="searchBar" class="styled-input" onkeyup="searchStudents()" placeholder="Search for students..">

    <table id="studentsTable">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Started Since</th>
            <th>Current Level</th>
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
                    <td>
                        <button class='viewDiagramButton styled-button' data-id='" . $row['id'] . "'>View Diagram</button>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No students found</td></tr>";
        }

        $conn->close();
        ?>
    </table>

    <script>
        // Function to filter students in the table
        function searchStudents() {
            var input, filter, table, tr, td, i, j, txtValue;
            input = document.getElementById("searchBar");
            filter = input.value.toUpperCase();
            table = document.getElementById("studentsTable");
            tr = table.getElementsByTagName("tr");

            for (i = 1; i < tr.length; i++) {
                tr[i].style.display = "none";
                td = tr[i].getElementsByTagName("td");
                for (j = 0; j < td.length; j++) {
                    if (td[j]) {
                        txtValue = td[j].textContent || td[j].innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                            break;
                        }
                    }
                }
            }
        }

        // Handle view diagram button clicks
        var viewDiagramButtons = document.getElementsByClassName("viewDiagramButton");
        for (var i = 0; i < viewDiagramButtons.length; i++) {
            viewDiagramButtons[i].onclick = function() {
                var studentId = this.getAttribute("data-id");
                // Redirect to a page where diagrams are shown for the selected student
                window.location.href = 'student_diagrams.php?id=' + studentId;
            }
        }
    </script>
</body>
</html>
