<?php
require_once("config.php");

if(isset($_GET['id'])) {
    $candidate_id = mysqli_real_escape_string($db, $_GET['id']);
    $fetchingCandidateData = mysqli_query($db, "SELECT * FROM candidate_details WHERE id = '". $candidate_id ."'") or die(mysqli_error($db));

    if(mysqli_num_rows($fetchingCandidateData) > 0) {
        $candidateData = mysqli_fetch_assoc($fetchingCandidateData);

        if(isset($_POST['updateCandidateBtn'])) {
            $newName = mysqli_real_escape_string($db, $_POST['newName']);
            $newDetails = mysqli_real_escape_string($db, $_POST['newDetails']);

            $updateQuery = "UPDATE candidate_details SET candidate_name = '$newName', candidate_details = '$newDetails' WHERE id = '$candidate_id'";
            $result = mysqli_query($db, $updateQuery);

            if(isset($_FILES['newPhoto']) && $_FILES['newPhoto']['error'] == 0) {
                $targetDir = "../assets/imgs/candidate_photos/";
                $newPhoto = $targetDir . rand(111111111, 99999999999) . "_" . rand(111111111, 99999999999) . $_FILES['newPhoto']['name'];
                move_uploaded_file($_FILES['newPhoto']['tmp_name'], $newPhoto);
                $updateQuery = "UPDATE candidate_details SET candidate_photo = '$newPhoto' WHERE id = '$candidate_id'";
                $result = mysqli_query($db, $updateQuery);
            }

            if($result) {
                echo "<div class='alert alert-success my-3' role='alert'>Candidate details updated successfully.</div>";
            } else {
                echo "<div class='alert alert-danger my-3' role='alert'>Error updating candidate details: " . mysqli_error($db) . "</div>";
            }

            header("Location: index.php?id=" . $candidate_id);
            exit();
        }

        // Display the edit form with existing data
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Candidate</title>
            <style>
                /* Your CSS styles go here */
                form {
                    max-width: 500px;
                    margin: auto;
                }

                h3 {
                    text-align: center;
                    color: #333;
                }

                label {
                    display: block;
                    margin-bottom: 8px;
                    color: #333;
                }

                input[type="text"],
                input[type="file"] {
                    width: 100%;
                    padding: 10px;
                    margin-bottom: 16px;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                    box-sizing: border-box;
                }

                input[type="submit"] {
                    background-color: #4caf50;
                    color: white;
                    padding: 12px 20px;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                }

                input[type="submit"]:hover {
                    background-color: #45a049;
                }

                input[type="hidden"] {
                    display: none;
                }

                .alert {
                    padding: 15px;
                    margin-bottom: 20px;
                    border: 1px solid #ddd;
                    border-radius: 4px;
                    color: #333;
                }

                .alert-success {
                    background-color: #dff0d8;
                    border-color: #d6e9c6;
                    color: #3c763d;
                }

                .alert-danger {
                    background-color: #f2dede;
                    border-color: #ebccd1;
                    color: #a94442;
                }
            </style>
        </head>
        <body>
            <h3>Edit Candidate</h3>
            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="candidate_id" value="<?php echo $candidateData['id']; ?>">
                <label for="newName">New Name:</label>
                <input type="text" name="newName" value="<?php echo $candidateData['candidate_name']; ?>" required><br>
                <label for="newDetails">New Details:</label>
                <input type="text" name="newDetails" value="<?php echo $candidateData['candidate_details']; ?>" required><br>
                <label for="newPhoto">New Photo:</label>
                <input type="file" name="newPhoto"><br>
                <input type="submit" value="Update Candidate" name="updateCandidateBtn" class="btn btn-primary">
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "<div class='alert alert-danger my-3' role='alert'>Candidate not found.</div>";
    }
} else {
    echo "<div class='alert alert-danger my-3' role='alert'>Invalid request.</div>";
}
?>
