<?php
@include 'config.php';
session_start();

if(isset($_GET['pid'])) {
    $project_id = $_GET['pid'];
    
    // Delete project from the database based on project_id
    $query = "DELETE FROM projects WHERE pid = $project_id";
    $result = mysqli_query($conn, $query);

    if($result) {
        // Show alert for successful deletion
        echo "<script>alert('Project deleted successfully');</script>";

        // Redirect back to the admin page after deleting the project
        header("Location: admin_page.php");
        exit();
    } else {
        echo "Error deleting project.";
    }
} else {
    echo "Project ID not provided.";
}
?>
