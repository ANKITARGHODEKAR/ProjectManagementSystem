<?php
@include 'config.php';
session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>View and Update Projects</title>

   <!-- Bootstrap CSS -->
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

   <style>
      /* Adjust styles if needed */
      .action-btns {
         display: flex;
      }
      .action-btns button {
         margin-right: 5px;
      }
   </style>
</head>
<body>
   <div class="container">
      <h2>View and Update Projects</h2>
      <table class="table">
         <thead>
            <tr>
            <th>User ID</th>
               <th>Project Name</th>
               <th>Description</th>
               <th>Status</th>
               <th>Date</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            <?php
            // Perform query to fetch projects from the database
            $query = "SELECT pid,name, description, status,created_at, uid FROM projects";
            $result = mysqli_query($conn, $query);

            // Check if query was successful
            if($result && mysqli_num_rows($result) > 0) {
               // Fetch rows from the result set
               while ($row = mysqli_fetch_assoc($result)) {
                  echo '<tr>';
                  echo '<td>' . $row['uid'] . '</td>';
                  echo '<td>' . $row['name'] . '</td>';
                  echo '<td>' . $row['description'] . '</td>';
                  echo '<td>' . $row['status'] . '</td>';
                  echo '<td>' . $row['created_at'] . '</td>';
                  echo '<td class="action-btns">';
                  echo '<a href="edit_project_user.php?pid=' . $row['pid'] . '" class="btn btn-primary">Edit</a>';
                  echo '<a href="delete_project.php?pid=' . $row['pid'] . '" class="btn btn-danger">Delete</a>';
                  echo '</td>';
                  echo '</tr>';
               }
            } else {
               echo '<tr><td colspan="5">No projects found.</td></tr>';
            }
            ?>
         </tbody>
      </table>
      <a href="user_page.php" class="btn btn-secondary">Back</a>
   </div>

   <!-- Bootstrap JS (optional) -->
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
