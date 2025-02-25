<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM user_details WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: index.php?message=User+Deleted+Successfully");
    } else {
        header("Location: index.php?message=Error+Deleting+User");
    }
    exit();
}
?>
