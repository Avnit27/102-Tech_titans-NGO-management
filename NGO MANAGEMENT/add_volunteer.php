<?php
include 'config.php';

if(isset($_POST['name'], $_POST['age'], $_POST['gender'], $_POST['work'], $_POST['dateJoined'])) {
    // Sanitize inputs
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $age = intval($_POST['age']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $work = mysqli_real_escape_string($conn, $_POST['work']);
    $dateJoined = mysqli_real_escape_string($conn, $_POST['dateJoined']);

    // Insert data into the database
    $query = "INSERT INTO volunteers (name, age, gender, work, date_joined) VALUES ('$name', $age, '$gender', '$work', '$dateJoined')";
    if(mysqli_query($conn, $query)) {
        echo "Volunteer added successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
