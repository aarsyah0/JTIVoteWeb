<?php
session_start();

if (isset($_SESSION['user_id'])) {
    // If the user is logged in
    echo "<script>
            if (confirm('Apakah Anda yakin ingin keluar?')) {
                // Clear session data and redirect to the index page
                window.onbeforeunload = null;
                location.assign('../index.php');
            } else {
                // User chose to stay logged in
            }
          </script>";
} else {
    // If the user is already logged out
    session_destroy(); // Destroy the session

    // Display a confirmation message and handle the response
    echo "<script>
            if (confirm('Apakah Anda yakin ingin keluar?')) {
                // Redirect to the index page
                window.onbeforeunload = null;
                location.assign('../index.php');
            } else {
                // User chose to stay logged in
                window.onbeforeunload = null;
                location.assign('../index.php');
            }
          </script>";
}
?>
