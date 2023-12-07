<?php
require_once("config.php");

if (isset($_GET['id'])) {
    $user = mysqli_real_escape_string($db, $_GET['id']);
    
    // Query to delete the candidate based on ID
    mysqli_query($db, "DELETE FROM users WHERE id = '$user'") or die(mysqli_error($db));
    
    echo "<script> location.assign('index.php?addVoterPage=1&deleted=1'); </script>";
} else {
    echo "Invalid request.";
}
?>
