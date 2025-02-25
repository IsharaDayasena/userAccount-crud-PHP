<?php
include 'connection.php';

if (isset($_POST['submit'])) {
    $First_Name = trim($_POST['First_Name']);
    $Last_Name = trim($_POST['Last_Name']);
    $age = trim($_POST['age']);

    // Check for empty fields
    if (empty($First_Name) || empty($Last_Name) || empty($age)) {
        $error_message = "All fields are required!";
        header("Location: index.php?message=" . urlencode($error_message));
        exit(); // Stop further execution
    }

    // Secure the data before inserting it into the database
    $First_Name = mysqli_real_escape_string($conn, $First_Name);
    $Last_Name = mysqli_real_escape_string($conn, $Last_Name);
    $age = mysqli_real_escape_string($conn, $age);

    // Insert data into the database
    $sql = "INSERT INTO user_details (`First_Name`, `Last_Name`, `Age`) VALUES ('$First_Name', '$Last_Name', '$age')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: index.php?message=" . urlencode("Data Inserted Successfully"));
    } else {
        header("Location: index.php?message=" . urlencode("Data Not Inserted"));
    }
    exit();
}
?>


