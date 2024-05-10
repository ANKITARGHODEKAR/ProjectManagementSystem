
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Add Project</title>

   <!-- Bootstrap CSS -->
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

   <style>
      /* Adjust styles if needed */
      .form-group {
         margin-bottom: 17px;
      }
   </style>
</head>
<body>
    
   <div class="container">
      <h2>Add Project</h2>
      <form action="add_project.php" method="POST">
         <div class="form-group">
            <label for="name">Project Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
         </div>

         <div class="form-group">
            <label for="userId">User ID:</label>
            <input type="text" class="form-control" id="userId" name="userId" required>
         </div>

         <div class="form-group">
            <label for="createdAt">Created At:</label>
            <input type="date" class="form-control" id="createdAt" name="createdAt" required>
         </div>

         <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
         </div>

         <div class="form-group">
            <label for="category">Category:</label>
            <input type="text" class="form-control" id="category" name="category" required>
         </div>

         <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" id="status" name="status" required>
               <option value="">Select</option>
               <option value="approval">Approval</option>
               <option value="disapproval">Disapproval</option>
            </select>
         </div>

         <div class="form-group">
            <label for="comments">Comments:</label>
            <textarea class="form-control" id="comments" name="comments"></textarea>
         </div>

         <button type="submit" class="btn btn-primary">Submit</button>
         <a href="user_page.php" class="btn btn-secondary">Back</a>
      </form>
   </div>

   <!-- Bootstrap JS (optional) -->
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
