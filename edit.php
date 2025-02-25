<?php
include('connection.php');

// Check if ID is set
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM user_details WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}

// Update user details
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $First_Name = $_POST['First_Name'];
    $Last_Name = $_POST['Last_Name'];
    $Age = $_POST['Age'];

    $sql = "UPDATE user_details SET First_Name='$First_Name', Last_Name='$Last_Name', Age='$Age' WHERE id=$id";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: index.php?message=User Updated Successfully");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<?php include ('header.php'); ?>

<h2>Edit User Details</h2>

<form action="edit.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    
    <div class="form-group">
        <label for="First_Name">First Name</label>
        <input type="text" class="form-control" name="First_Name" value="<?php echo $row['First_Name']; ?>">
    </div>

    <div class="form-group">
        <label for="Last_Name">Last Name</label>
        <input type="text" class="form-control" name="Last_Name" value="<?php echo $row['Last_Name']; ?>">
    </div>

    <div class="form-group">
        <label for="Age">Age</label>
        <input type="text" class="form-control" name="Age" value="<?php echo $row['Age']; ?>">
    </div>

    <button type="submit" name="update" class="btn btn-primary">Update</button>
</form>

<?php include ('footer.php'); ?>
