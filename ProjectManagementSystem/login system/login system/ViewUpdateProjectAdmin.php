<?php
@include 'config.php';
session_start();

// if(!isset($_SESSION['user_name'])){
//    header('location:login_form.php');
// }
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
               <th>Project ID</th>
               <th>User ID</th>
               <th>Project Name</th>
               <th>Description</th>
               <th>Status</th>
               <th>Date</th>
               <!-- <th>Accept/Reject</th>
               <th>Comments</th> -->
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            <?php
            // Perform query to fetch projects from the database
            $query = "SELECT pid, uid, name, description, status, created_at FROM projects";
            $result = mysqli_query($conn, $query);

            // Check if query was successful
            if($result && mysqli_num_rows($result) > 0) {
               // Fetch rows from the result set
               while ($row = mysqli_fetch_assoc($result)) {
                  echo '<tr>';
                  echo '<td>' . $row['pid'] . '</td>';
                  echo '<td>' . $row['uid'] . '</td>';
                  echo '<td>' . $row['name'] . '</td>';
                  echo '<td>' . $row['description'] . '</td>';
                  echo '<td>' . $row['status'] . '</td>';
                  echo '<td>' . $row['created_at'] . '</td>';
                  // echo '<td>';
                  // echo '<select class="form-control">';
                  // echo '<option value="">Select</option>';
                  // echo '<option value="accept">Accept</option>';
                  // echo '<option value="reject">Reject</option>';
                  // echo '</select>';
                  // echo '</td>';
                 // echo '<td><input type="text" class="form-control"></td>'; // Input field for comments
                  echo '<td class="action-btns">';
                  echo '<a href="edit_project.php?pid=' . $row['pid'] . '" class="btn btn-primary">Edit</a>';
                  echo '<a href="delete_project.php?pid=' . $row['pid'] . '" class="btn btn-danger">Delete</a>';
                  echo '</td>';
                  echo '</tr>';
               }
            } else {
               echo '<tr><td colspan="9">No projects found.</td></tr>';
            }
            ?>
            
         </tbody>
      </table>
      <a href="admin_page.php" class="btn btn-secondary">Back</a>
   </div>
   

   <!-- Bootstrap JS (optional) -->
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
