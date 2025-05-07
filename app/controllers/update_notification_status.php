<?php
session_start();
include('config.php'); // Ensure database connection is included
include 'get_session.php';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];

    // Update all notifications for the user to read status
    $query = "UPDATE user_notifications SET status = 1 WHERE user_id = ?";
    
    // Prepare and execute statement
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        
        // Check for success
        if ($stmt->affected_rows > 0) {
            echo 'success';
        } else {
            echo 'failed';
        }
        
        $stmt->close();
    } else {
        echo 'error';
    }
    
    $conn->close();
} else {
    echo 'invalid_request';
}
?>
