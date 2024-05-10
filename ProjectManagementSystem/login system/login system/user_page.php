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
   <title>User Page</title>

   <!-- Custom CSS file link  -->
   <link rel="stylesheet" href="css/style.css">

   <!-- Custom CSS for Sidebar -->
   <style>
      .sidebar {
         width: 200px;
         height: 100%;
         background-color: #f1f1f1;
         position: fixed;
         top: 0;
         left: 0;
         padding-top: 20px;
      }
      
      .sidebar a {
         padding: 10px 15px;
         text-decoration: none;
         display: block;
      }

      .sidebar a:hover {
         background-color: #ddd;
      }

      .content {
         margin-left: 200px; /* Same width as the sidebar */
         padding: 20px;
      }
      
   </style>

</head>
<body>
   
<div class="sidebar">
   <a href="Dashboard.php">Dashboard</a>
   <a href="CreateProject.php">Create Project</a>
   <a href="ViewUpdateProject.php">View & Update Project</a>
   <a href="logout.php">Logout</a>
</div>

<div class="content">
   <h3>Hi, <span>User</span></h3>
   <h1>Welcome <span style='color:#8B9820;'><?php echo $_SESSION['user_name'] ?></span></h1>
   <p>This is a user page</p>
</div>

</body>
</html>
