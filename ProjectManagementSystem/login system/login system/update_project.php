<?php
@include 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if project ID is provided
    if (isset($_POST['pid'])) {
        $pid = $_POST['pid'];

        // Initialize arrays to store updated fields and their corresponding values
        $update_fields = array();
        $update_values = array();

        // Check and add each field to the update arrays if it's set
        if (isset($_POST['name'])) {
            $update_fields[] = "name";
            $update_values[] = $_POST['name'];
        }
        if (isset($_POST['description'])) {
            $update_fields[] = "description";
            $update_values[] = $_POST['description'];
        }
        if (isset($_POST['status'])) {
            $update_fields[] = "status";
            $update_values[] = $_POST['status'];
        }
        if (isset($_POST['created_at'])) {
            $update_fields[] = "created_at";
            $update_values[] = $_POST['created_at'];
        }
        if (isset($_POST['accept_reject'])) {
            $update_fields[] = "accept_reject";
            $update_values[] = $_POST['accept_reject'];
        }
        if (isset($_POST['admin_comm'])) {
            $update_fields[] = "admin_comm"; // Ensure the field name matches the form input name
            $update_values[] = $_POST['admin_comm'];
        }

        // Generate the update query dynamically based on the updated fields
        if (count($update_fields) > 0) {
            $update_query = "UPDATE projects SET ";
            for ($i = 0; $i < count($update_fields); $i++) {
                $update_query .= $update_fields[$i] . "='" . $update_values[$i] . "'";
                if ($i < count($update_fields) - 1) {
                    $update_query .= ", ";
                }
            }
            $update_query .= " WHERE pid=$pid";

            // Perform the update
            $result = mysqli_query($conn, $update_query);
            if ($result) {
                // Redirect back to the edit project page or any other desired page
                header("Location: edit_project.php?pid=$pid");
                exit();
            } else {
                echo "Error updating project.";
            }
        } else {
            echo "No fields to update.";
        }
    } else {
        echo "Project ID not provided.";
    }
}
?>

