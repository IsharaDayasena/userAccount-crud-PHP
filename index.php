<?php
include ('header.php');
include('connection.php');
?>    
 <h1 id="main-title">User Details Application</h1>
 <div class="box1">
    <!-- Button trigger modal -->
     <h3>User Details</h3>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add New User
</button>
 </div>
        <table class="table table-bordered table:hover table-striped">
            <thead>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Actions</th>

</thead>
<tbody>
    <?php
    $sql= "SELECT * FROM `user_details`"  ;
    $result = mysqli_query($conn, $sql);  
    if(!$result){
        die("No data Found". mysqli_error($conn));
    }else{
        while($row = mysqli_fetch_assoc($result)){
            ?>
            <tr>
            <td><?php echo $row['id']?></td>
            <td><?php echo $row['First_Name']?></td>         
            <td><?php echo $row['Last_Name']?></td>
            <td><?php echo $row['Age']?></td>
            <td>
                        <!-- Edit Button -->
                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm" >Edit</a>
                        
                        <!-- Delete Button -->
                        <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                    </td>
        </tr>
        <?php
        }
    }
    
    ?>
   </tbody>


        </table>

        <!-- Message Display -->
        <?php
    if(isset($_GET['message'])){
        ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $_GET['message']?>
        </div>
        <?php
    }

   ?>

<!-- Form Creation -->
 <form action="insert.php" method="POST">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="First_Name">First Name</label>
            <input type="text" class="form-control"  name="First_Name" >
        </div>
        <div class="form-group">
            <label for="Last_Name">Last Name</label>
            <input type="text" class="form-control"  name="Last_Name" >
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input type="text" class="form-control"  name="age" >
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" name="submit" class="btn btn-primary" value="Add">
      </div>
    </div>
  </div>
</div>
</form>

        <?php
include ('footer.php');
?> 