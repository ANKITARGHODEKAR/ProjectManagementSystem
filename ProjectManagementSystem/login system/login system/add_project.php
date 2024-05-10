<?php
@include 'config.php'; // Include your database configuration

if($_SERVER["REQUEST_METHOD"] == "POST") {
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $userId = mysqli_real_escape_string($conn, $_POST['userId']);
   $createdAt = $_POST['createdAt'];
   $description = mysqli_real_escape_string($conn, $_POST['description']);
   $category = mysqli_real_escape_string($conn, $_POST['category']);
   $status = $_POST['status'];
   $comments = mysqli_real_escape_string($conn, $_POST['comments']);

   // Insert into database
   $insert_query = "INSERT INTO projects (name, uid, created_at, description, category, status, comments) 
                    VALUES ('$name', '$userId', '$createdAt', '$description', '$category', '$status', '$comments')";

   if(mysqli_query($conn, $insert_query)) {
      echo "Project added successfully.";
   } else {
      echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
   }
}
?>