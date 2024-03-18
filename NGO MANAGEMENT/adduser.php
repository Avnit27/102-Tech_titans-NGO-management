<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Volunteer Management</title>
    <link rel="stylesheet" href="userlist.css" />
</head>
<body>
    <h2>Volunteer Management</h2>
    <hr class="horizontal-line" />

    <div class="user-operations">
        <button id="addUserButton">Add Volunteer</button>
        <button id="editUserButton">Edit Volunteer</button>
        <button id="deactivateUserButton"><a href="dashboard.php"> Profile</a></button>
    </div>

    <div id="userList">
        <table id="userTable">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Work</th>
                    <th>Date Joined</th>
                    <th>Delete Volunteer</th>
                </tr>
            </thead>
            <tbody>
                <!-- User list will be populated here -->
                <?php
                // Include database connection
                include 'config.php';

                // Fetch volunteer data from the database
                $result = mysqli_query($conn, "SELECT * FROM volunteers") or die('Query failed');
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['age'] . "</td>";
                        echo "<td>" . $row['gender'] . "</td>";
                        echo "<td>" . $row['work'] . "</td>";
                        echo "<td>" . $row['date_joined'] . "</td>";
                        echo "<td><button class='deleteButton' data-id='" . $row['id'] . "'>Delete</button></td>"; // Delete button
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
        <div id="messageBox"></div>
    </div>

    <div id="addUserPanel" class="hidden">
    <h3>Add Volunteer</h3>
    <form id="addUserForm" action="add_volunteer.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required />
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required />
        <label for="gender">Gender:</label>
        <input type="text" id="gender" name="gender" required />
        <label for="work">Work:</label>
        <input type="text" id="work" name="work" required />
        <label for="dateJoined">Date Joined:</label>
        <input type="date" id="dateJoined" name="dateJoined" required />
        <button type="submit" id="submitUser">Submit</button>
    </form>
</div>

<div id="editUserPanel" class="hidden">
    <h3>Edit Volunteer</h3>
    <form id="editUserForm" action="edit_volunteer.php" method="post">
        <label for="editName">Name:</label>
        <input type="text" id="editName" name="name" required />
        <label for="editAge">Age:</label>
        <input type="number" id="editAge" name="age" required />
        <label for="editGender">Gender:</label>
        <input type="text" id="editGender" name="gender" required />
        <label for="editWork">Work:</label>
        <input type="text" id="editWork" name="work" required />
        <label for="editDateJoined">Date Joined:</label>
        <input type="date" id="editDateJoined" name="dateJoined" required />
        <input type="hidden" id="editUserId" name="editUserId" />
        <button type="button" id="submitEdit">Save Changes</button>
    </form>
</div>


    <script>
    // JavaScript code to toggle visibility of the Add Volunteer form
    document.addEventListener("DOMContentLoaded", function() {
        const addUserButton = document.getElementById("addUserButton");
        const addUserPanel = document.getElementById("addUserPanel");

        addUserButton.addEventListener("click", function() {
            addUserPanel.classList.toggle("show"); // Toggle the show class
        });
    });

    // JavaScript code to toggle visibility of the Edit Volunteer form
    document.addEventListener("DOMContentLoaded", function() {
        const editUserButton = document.getElementById("editUserButton");
        const editUserPanel = document.getElementById("editUserPanel");

        editUserButton.addEventListener("click", function() {
            editUserPanel.classList.toggle("show"); // Toggle the show class
        });
    });

    // JavaScript code to handle the form submission for adding a volunteer
    document.addEventListener("DOMContentLoaded", function() {
        const addUserForm = document.getElementById("addUserForm");
        const messageBox = document.getElementById("messageBox");

        addUserForm.addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent default form submission

            // Create FormData object to send form data
            const formData = new FormData(addUserForm);

            // Send AJAX request
            fetch("add_volunteer.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.text())
            .then(message => {
                // Display the message in the messageBox
                messageBox.textContent = message;
                console.log("Response:", message);

                // Reload the page after displaying the message
                setTimeout(function() {
                    window.location.reload();
                }, 2000); // Reload after 2 seconds (adjust as needed)
            })
            .catch(error => {
                console.error("Error:", error);
                messageBox.textContent = "An error occurred while adding the volunteer.";
            });
        });
    });

    // JavaScript code to handle the form submission for editing a volunteer
    document.addEventListener("DOMContentLoaded", function() {
        const editForm = document.getElementById("editUserForm");
        const messageBox = document.getElementById("messageBox");

        editForm.addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent default form submission

            // Create FormData object to send form data
            const formData = new FormData(editForm);

            // Send AJAX request
            fetch("edit_volunteer.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.text())
            .then(message => {
                // Display the message in the messageBox
                messageBox.textContent = message;
                console.log("Response:", message);

                // Reload the page after displaying the message
                setTimeout(function() {
                    window.location.reload();
                }, 2000); // Reload after 2 seconds (adjust as needed)
            })
            .catch(error => {
                console.error("Error:", error);
                messageBox.textContent = "An error occurred while editing the volunteer.";
            });
        });
    });

    // JavaScript code to handle delete volunteer button click
    document.addEventListener("DOMContentLoaded", function() {
        const deleteButtons = document.querySelectorAll(".deleteButton");

        deleteButtons.forEach(button => {
            button.addEventListener("click", function() {
                const volunteerId = this.dataset.id;
                if (confirm("Are you sure you want to delete this volunteer?")) {
                    fetch("delete_volunteer.php", {
                        method: "POST",
                        body: JSON.stringify({ id: volunteerId }),
                        headers: {
                            "Content-Type": "application/json"
                        }
                    })
                    .then(response => response.text())
                    .then(message => {
                        alert(message);
                        window.location.reload();
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        alert("An error occurred while deleting the volunteer.");
                    });
                }
            });
        });
    });
</script>

</body>
</html>
