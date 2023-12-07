<?php
if (isset($_GET['added'])) {
    ?>
    <div class="alert alert-success my-3" role="alert">
        Voter has been added successfully.
    </div>
    <?php
} else if (isset($_GET['failed'])) {
    ?>
    <div class="alert alert-danger my-3" role="alert">
        Failed to add voter. Please try again.
    </div>
    <?php
}
?>

<div class="row my-3">
    <div class="col-4">
        <!-- Form for adding new voter -->
        <h3>Add New Voter</h3>
        <form method="POST">
            <div class="form-group">
                <input type="text" name="contact_no" placeholder="Nama" class="form-control" required />
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" class="form-control" required />
            </div>
            <input type="submit" value="Add Voter" name="addVoterBtn" class="btn btn-success" />
        </form>
    </div>
    <div class="col-8">
        <!-- Table for displaying voters -->
        <h3>Voter Details</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Nama</th>
                    <th scope="col">User Role</th>
                    <th scope="col">Password</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch and display voter details
                $fetchingData = mysqli_query($db, "SELECT * FROM users") or die(mysqli_error($db));
                while ($row = mysqli_fetch_assoc($fetchingData)) {
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['contact_no']; ?></td>
                        <td><?php echo $row['user_role']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                        <td>
                            <!-- Delete button for each row -->
                            <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-delete">Delete</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php
if (isset($_POST['addVoterBtn'])) {
    $randomNumber = rand(10000, 99999); // Generate a random number between 10000 and 99999
    $username = "E412" . $randomNumber;
    $contact_no = mysqli_real_escape_string($db, $_POST['contact_no']);
    $password = mysqli_real_escape_string($db, $_POST['password']); // Without hashing

    // Insert data into the `users` table
    $query = "INSERT INTO users (username, contact_no, password, user_role) VALUES ('$username', '$contact_no', '$password', 'Voter')";
    $result = mysqli_query($db, $query);

    if ($result) {
        echo "<script> location.assign('index.php?addVoterPage=1&added=1'); </script>";
    } else {
        echo "<script> location.assign('index.php?addVoterPage=1&failed=1'); </script>";
    }
}
?>
