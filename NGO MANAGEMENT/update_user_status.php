<?php
include 'config.php';

if (isset($_GET['userId'], $_GET['action'])) {
    $userId = mysqli_real_escape_string($conn, $_GET['userId']);
    $action = mysqli_real_escape_string($conn, $_GET['action']);

    // Check if the action is valid (activate or deactivate)
    if ($action === "activate" || $action === "deactivate") {
        // Update the user status in the database
        $status = ($action === "activate") ? 1 : 0;
        $query = "UPDATE volunteers SET active=$status WHERE id=$userId";
        if (mysqli_query($conn, $query)) {
            echo "User status updated successfully!";
        } else {
            echo "Error updating user status: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid action!";
    }
} else {
    echo "Missing parameters!";
}
?>
