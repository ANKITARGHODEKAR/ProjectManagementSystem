<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Page</title>

   <!-- Custom CSS file link -->
   <link rel="stylesheet" href="css/style.css">

   <!-- Bootstrap CSS -->
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

   <style>
      /* Adjust styles if needed */
      .sidebar {
         position: fixed;
         top: 0;
         left: 0;
         width: 250px;
         height: 100%;
         background-color: #333;
         padding-top: 20px;
      }
      .sidebar a {
         display: block;
         color: white;
         padding: 10px 20px;
         text-decoration: none;
         transition: 0.3s;
      }
      .sidebar a:hover {
         background-color: #555;
      }
   </style>
</head>
<body>
   
<div class="sidebar">
   <a href="Dashboard.php">Dashboard</a>
   <a href="ViewUpdateProjectAdmin.php">View and Update Project</a>
   <a href="logout.php">Logout</a>
</div>

<div class="container" style="margin-left: 250px;">
   <div class="content">
      <h3>Hi, <span>Admin</span></h3>
      <h1>Welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
      <p>This is an admin page</p>
   </div>
</div>

<!-- Bootstrap JS (optional) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
