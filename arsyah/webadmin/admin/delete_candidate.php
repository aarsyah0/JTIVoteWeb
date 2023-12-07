<?php
require_once("config.php");


if(isset($_GET['id'])) {
    $candidate_id = mysqli_real_escape_string($db, $_GET['id']);
    // Query untuk menghapus kandidat berdasarkan ID
    mysqli_query($db, "DELETE FROM candidate_details WHERE id = '". $candidate_id ."'") or die(mysqli_error($db));
    
    echo "<script> location.assign('index.php?addCandidatePage=1&deleted=1'); </script>";
} else {
    echo "Invalid request.";
}
?>
