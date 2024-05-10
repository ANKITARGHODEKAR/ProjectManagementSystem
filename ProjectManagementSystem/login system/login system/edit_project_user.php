<?php
@include 'config.php';
session_start();

// Check if project ID is provided in the URL
if(isset($_GET['pid'])) {
    $project_id = $_GET['pid'];
    
    // Fetch project details from the database based on project_id
    $query = "SELECT * FROM projects WHERE pid = $project_id";
    $result = mysqli_query($conn, $query);

    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Now you can display the project details in input fields for editing
    } else {
        echo "Project not found.";
    }
} else {
    echo "Project ID not provided.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Edit Project</title>
   <!-- Bootstrap CSS -->
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
   <div class="container">
      <h2>Edit Project</h2>
      <form method="POST" action="update_project_user.php">
         <input type="hidden" name="pid" value="<?php echo $row['pid']; ?>">
         <div class="form-group">
            <label for="name">Project Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>">
         </div>
         <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description"><?php echo $row['description']; ?></textarea>
         </div>
         <div class="form-group">
            <label for="status">Status:</label>
            <input type="text" class="form-control" id="status" name="status" value="<?php echo $row['status']; ?>">
         </div>
         <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" class="form-control" id="date" name="date" value="<?php echo $row['created_at']; ?>">
         </div>
         
         <button type="submit" class="btn btn-primary">Update</button>
         <a href="ViewUpdateProject.php" class="btn btn-secondary">Back</a>
      </form>
   </div>

   <!-- Bootstrap JS (optional) -->
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
