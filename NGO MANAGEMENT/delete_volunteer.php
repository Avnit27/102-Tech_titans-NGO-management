<?php
// Include database connection
include 'config.php';

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Decode the JSON data sent from the client
    $data = json_decode(file_get_contents("php://input"));

    // Check if the ID is provided
    if (isset($data->id)) {
        // Sanitize the ID
        $id = mysqli_real_escape_string($conn, $data->id);

        // Perform the delete operation
        $query = "DELETE FROM volunteers WHERE id = $id";
        if (mysqli_query($conn, $query)) {
            echo "Volunteer deleted successfully!";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Error: ID not provided";
    }
} else {
    echo "Error: Invalid request method";
}
?>
