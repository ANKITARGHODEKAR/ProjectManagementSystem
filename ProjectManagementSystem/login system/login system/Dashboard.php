<?php
@include 'config.php';
session_start();

// if (!isset($_SESSION['user_name'])) {
//     header('location:login_form.php');
// }

// Fetch count of all projects
$query_total_projects = "SELECT COUNT(*) AS total_projects FROM projects";
$result_total_projects = mysqli_query($conn, $query_total_projects);
$row_total_projects = mysqli_fetch_assoc($result_total_projects);
$total_projects = $row_total_projects['total_projects'];

// Fetch count of approval projects
$query_approval_projects = "SELECT COUNT(*) AS approval_projects FROM projects WHERE status = 'approval'";
$result_approval_projects = mysqli_query($conn, $query_approval_projects);
$row_approval_projects = mysqli_fetch_assoc($result_approval_projects);
$approval_projects = $row_approval_projects['approval_projects'];

// Fetch count of disapproval projects
$query_disapproval_projects = "SELECT COUNT(*) AS disapproval_projects FROM projects WHERE status = 'disapproval'";
$result_disapproval_projects = mysqli_query($conn, $query_disapproval_projects);
$row_disapproval_projects = mysqli_fetch_assoc($result_disapproval_projects);
$disapproval_projects = $row_disapproval_projects['disapproval_projects'];

// Function to check if the user is an admin
function isAdmin() {
    return isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'admin';

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Adjust styles if needed */
        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Dashboard</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Projects</h5>
                    <p class="card-text"><?php echo $total_projects; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Approval Projects</h5>
                    <p class="card-text"><?php echo $approval_projects; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Disapproval Projects</h5>
                    <p class="card-text"><?php echo $disapproval_projects; ?></p>
                </div>
            </div>
        </div>
    </div>
    <?php if (isAdmin()): ?>
        <a href="admin_page.php" class="btn btn-primary">Back</a>
    <?php else: ?>
        <a href="user_page.php" class="btn btn-primary">Back</a>
    <?php endif; ?>
</div>

<!-- Bootstrap JS (optional) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
