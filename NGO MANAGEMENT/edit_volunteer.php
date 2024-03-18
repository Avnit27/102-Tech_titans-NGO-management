<?php
include 'config.php';

// Debugging: Output the received POST data
var_dump($_POST);

if(isset($_POST['editUserId'], $_POST['name'], $_POST['age'], $_POST['gender'], $_POST['work'], $_POST['dateJoined'])) {
    // Sanitize inputs
    $id = intval($_POST['editUserId']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $age = intval($_POST['age']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $work = mysqli_real_escape_string($conn, $_POST['work']);
    $dateJoined = mysqli_real_escape_string($conn, $_POST['dateJoined']);

    // Update data in the database
    $query = "UPDATE volunteers SET name='$name', age=$age, gender='$gender', work='$work', date_joined='$dateJoined' WHERE id=$id";
    if(mysqli_query($conn, $query)) {
        echo "Volunteer updated successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
