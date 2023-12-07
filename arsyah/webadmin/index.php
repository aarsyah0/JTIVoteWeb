<?php
require_once("admin/config.php");

$fetchingElections = mysqli_query($db, "SELECT * FROM elections") OR die(mysqli_error($db));
while ($data = mysqli_fetch_assoc($fetchingElections)) {
    $starting_date = $data['starting_date'];
    $ending_date = $data['ending_date'];
    $current_date = date("Y-m-d");
    $election_id = $data['id'];
    $status = $data['status'];
    $max_vote = $data['maxvote'];

    if ($status == "Active") {
        $date1 = date_create($current_date);
        $date2 = date_create($ending_date);
        $diff = date_diff($date1, $date2);

        if ((int)$diff->format("%R%a") < 0) {
            // Update status to 'Expired' if the election has ended
            mysqli_query($db, "UPDATE elections SET status = 'Expired' WHERE id = '" . $election_id . "'") OR die(mysqli_error($db));
        }

        // Check if the maximum vote limit is reached
        $vote_count = getVoteCount($db, $election_id);
        if ($vote_count >= $max_vote) {
            // Update status to 'Completed' if the maximum vote limit is reached
            mysqli_query($db, "UPDATE elections SET status = 'Completed' WHERE id = '" . $election_id . "'") OR die(mysqli_error($db));
        }

        // Check if both end date and max vote conditions are met, then update status to 'Nonaktif'
        if ((int)$diff->format("%R%a") < 0 && $vote_count >= $max_vote) {
            mysqli_query($db, "UPDATE elections SET status = 'Nonaktif' WHERE id = '" . $election_id . "'") OR die(mysqli_error($db));
        }
    } else if ($status == "InActive") {
        $date1 = date_create($current_date);
        $date2 = date_create($starting_date);
        $diff = date_diff($date1, $date2);

        if ((int)$diff->format("%R%a") <= 0) {
            // Update status to 'Active' if the election has started
            mysqli_query($db, "UPDATE elections SET status = 'Active' WHERE id = '" . $election_id . "'") OR die(mysqli_error($db));
        }
    }
}

function getVoteCount($db, $election_id) {
    $result = mysqli_query($db, "SELECT COUNT(DISTINCT voters_id) as vote_count FROM votings WHERE election_id = '" . $election_id . "'") OR die(mysqli_error($db));
    $row = mysqli_fetch_assoc($result);
    return $row['vote_count'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/imgs/image 2.png" />
    </meta>
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <title>Login - JTI-Vote</title>

    <!-- css -->
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    <div class="container">
        <div class="user_card">
            <div class="brand_logo_container">
                <img src="assets/imgs/image.png" class="brand_logo" alt="Logo">
            </div>

            <?php 
                if(isset($_GET['sign-up']))
                {
            ?>
                    <div class="form_container">
                        <form method="POST">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-user"></i></span>
                                <input type="text" name="su_username" class="form-control input_user" placeholder="Username" required />
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-key"></i></span>
                                <input type="text" name="su_contact_no" class="form-control input_pass" placeholder="Contact #" required />
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-key"></i></span>
                                <input type="password" name="su_password" class="form-control input_pass" placeholder="Password" required />
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-key"></i></span>
                                <input type="password" name="su_retype_password" class="form-control input_pass" placeholder="Retype Password" required />
                            </div>
                            
                            <div class="login_container">
                                <button type="submit" name="sign_up_btn" class="btn login_btn">Sign Up</button>
                            </div>
                        </form>
                    </div>
            
                    <div class="mt-4">
                        <div class="links text-white">
                            Already Created Account? <a href="index.php" class="ml-2 text-white">Sign In</a>
                        </div>
                    </div>
            <?php
                } else {
            ?>
                    <div class="form_container">
                        <form method="POST">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-user"></i></span>
                                <input type="text" name="contact_no" class="form-control input_user" placeholder="Username" required />
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-key"></i></span>
                                <input type="password" name="password" class="form-control input_pass" placeholder="Password" required />
                            </div>
                            <div class="login_container">
                                <button type="submit" name="loginBtn" class="btn login_btn">Login</button>
                            </div>
                        </form>   
                    </div>
            
                    <div class="mt-4">
                        <div class="links text-white">
                            Don't have an account? <a href="?sign-up=1" class="ml-2 text-white">Sign Up</a>
                        </div>
                    </div>
            <?php
                }
            ?>

            <?php 
                if(isset($_GET['registered']))
                {
            ?>
                    <span class="bg-white text-success text-center my-3"> Your account has been created successfully! </span>
            <?php
                } else if(isset($_GET['invalid'])) {
            ?>
                    <span class="bg-white text-danger text-center my-3"> Passwords mismatched, please try again! </span>
            <?php
                } else if(isset($_GET['not_registered'])) {
            ?>
                    <span class="bg-white text-warning text-center my-3"> Sorry, you are not registered! </span>
            <?php
                } else if(isset($_GET['invalid_access'])) {
            ?>
                    <span class="bg-white text-danger text-center my-3"> Invalid username or password! </span>
            <?php
                }
            ?>
        </div>
    </div>
</body>
</html>

<?php 
    require_once("admin/config.php");

    if(isset($_POST['sign_up_btn']))
    {
        $su_username = mysqli_real_escape_string($db, $_POST['su_username']);
        $su_contact_no = mysqli_real_escape_string($db, $_POST['su_contact_no']);
        $su_password = mysqli_real_escape_string($db, ($_POST['su_password']));
        $su_retype_password = mysqli_real_escape_string($db, ($_POST['su_retype_password']));
        $user_role = "Voter"; 

        if($su_password == $su_retype_password)
        {
            // Insert Query 
            mysqli_query($db, "INSERT INTO users(username, contact_no, password, user_role) VALUES('". $su_username ."', '". $su_contact_no ."', '". $su_password ."', '". $user_role ."')") or die(mysqli_error($db));
        ?>
            <script> location.assign("index.php?sign-up=1&registered=1"); </script>
        <?php
        } else {
    ?>
            <script> location.assign("index.php?sign-up=1&invalid=1"); </script>
    <?php
        }
    } else if(isset($_POST['loginBtn'])) {
        $contact_no = mysqli_real_escape_string($db, $_POST['contact_no']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
    
        // Query Fetch / SELECT
        $fetchingData = mysqli_query($db, "SELECT * FROM users WHERE username = '". $contact_no ."'") or die(mysqli_error($db));
    
        if(mysqli_num_rows($fetchingData) > 0) {
            $data = mysqli_fetch_assoc($fetchingData);
    
            if($contact_no == $data['username'] AND $password == $data['password']) {
                session_start();
                $_SESSION['user_role'] = $data['user_role'];
                $_SESSION['username'] = $data['username'];
                $_SESSION['user_id'] = $data['id'];
    
                if($data['user_role'] == "Admin") {
                    $_SESSION['key'] = "AdminKey";
                ?>
                    <script> location.assign("admin/index.php?homepage=1"); </script>
                <?php
                } else {
                    $_SESSION['key'] = "VotersKey";
                ?>
                    <script> location.assign("webvoter/index.php?homepage=1"); </script>
                <?php
                }
            } else {
            ?>
                <script> location.assign("index.php?invalid_access=1"); </script>
            <?php
            }
        } else {
        ?>
            <script> location.assign("index.php?sign-up=1&not_registered=1"); </script>
        <?php
        }
    }
?>
