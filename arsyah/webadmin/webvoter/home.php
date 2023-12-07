
<div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="user">
                    <img src="assets/imgs/customer01.jpg" alt="">
                </div>
            </div>

            
            <div class="row my-3">
        <div class="col-12">
            <h3> Voters Panel </h3>

            <?php 
                $fetchingActiveElections = mysqli_query($db, "SELECT * FROM elections WHERE status = 'Active'") or die(mysqli_error($db));
                $totalActiveElections = mysqli_num_rows($fetchingActiveElections);

                if($totalActiveElections > 0) 
                {
                    while($data = mysqli_fetch_assoc($fetchingActiveElections))
                    {
                        $election_id = $data['id'];
                        $election_topic = $data['election_topic'];    
                ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="4" class="bg-green text-white"><h5> ELECTION TOPIC: <?php echo strtoupper($election_topic); ?></h5></th>
                                </tr>
                                <tr>
                                    <th> Photo </th>
                                    <th> Candidate Details </th>
                                    <th> # of Votes </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $fetchingCandidates = mysqli_query($db, "SELECT * FROM candidate_details WHERE election_id = '". $election_id ."'") or die(mysqli_error($db));

                                while($candidateData = mysqli_fetch_assoc($fetchingCandidates))
                                {
                                    $candidate_id = $candidateData['id'];
                                    $candidate_photo = $candidateData['candidate_photo'];

                                    // Fetching Candidate Votes 
                                    $fetchingVotes = mysqli_query($db, "SELECT * FROM votings WHERE candidate_id = '". $candidate_id . "'") or die(mysqli_error($db));
                                    $totalVotes = mysqli_num_rows($fetchingVotes);

                            ?>
                                    <tr>
                                        <td> <img src="<?php echo $candidate_photo; ?>" class="candidate_photo"> </td>
                                        <td><?php echo "<b>" . $candidateData['candidate_name'] . "</b><br />" . $candidateData['candidate_details']; ?></td>
                                        <td><?php echo $totalVotes; ?></td>
                                        <td>
                                    <?php
                                            $checkIfVoteCasted = mysqli_query($db, "SELECT * FROM votings WHERE voters_id = '". $_SESSION['user_id'] ."' AND election_id = '". $election_id ."'") or die(mysqli_error($db));    
                                            $isVoteCasted = mysqli_num_rows($checkIfVoteCasted);

                                            if($isVoteCasted > 0)
                                            {
                                                $voteCastedData = mysqli_fetch_assoc($checkIfVoteCasted);
                                                $voteCastedToCandidate = $voteCastedData['candidate_id'];

                                                if($voteCastedToCandidate == $candidate_id)
                                                {
                                    ?>

                                                    <img src="assets/imgs/vote.png" width="100px;">
                                    <?php
                                                }
                                            }else {
                                    ?>
                                                <button class="btn btn-md btn-success" onclick="CastVote(<?php echo $election_id; ?>, <?php echo $candidate_id; ?>, <?php echo $_SESSION['user_id']; ?>)"> Vote </button>
                                    <?php
                                            }

                                            
                                    ?>


                                    </td>
                                    </tr>
                            <?php
                                }
                            ?>
                            </tbody>

                        </table>
                <?php
                    
                    }
                }else {
                    echo "No any active election.";
                }
            ?>

            
        </div>
    </div>


<!-- Di dalam file index.php -->
<script>
    const CastVote = (election_id, candidate_id, voters_id) => {
        $.ajax({
            type: "POST", 
            url: "index.php",  // Tetap menggunakan halaman yang sama
            data: { 
                e_id: election_id,
                c_id: candidate_id,
                v_id: voters_id,
                action: 'castVote'  // Menambahkan parameter untuk menandai tindakan
            }, 
            success: function(response) {
                if(response == "Success") {
                    location.assign("index.php?voteCasted=1");
                } else {
                    location.assign("index.php?voteNotCasted=1");
                }
            }
        });
    }
</script>

<?php
// Di dalam file index.php (setelah tag <script>)
if(isset($_POST['action']) && $_POST['action'] == 'castVote') {
    // Pastikan parameter yang diperlukan ada
    if(isset($_POST['e_id']) && isset($_POST['c_id']) && isset($_POST['v_id'])) {
        $election_id = $_POST['e_id'];
        $candidate_id = $_POST['c_id'];
        $voters_id = $_POST['v_id'];

        // Lakukan proses penyimpanan suara ke dalam database di sini

        // Contoh: Masukkan suara ke dalam tabel votings
        $insertVoteQuery = mysqli_query($db, "INSERT INTO votings (election_id, candidate_id, voters_id) VALUES ('$election_id', '$candidate_id', '$voters_id')");

        if($insertVoteQuery) {
            echo "Success";
            exit;  // Penting untuk menghentikan eksekusi setelah mengirim respons
        } else {
            echo "Failed";
            exit;
        }
    } else {
        echo "Invalid request";
        exit;
    }
}
?>




            <!-- ================ Order Details List ================= -->

                <!-- ================= New Customers ================ -->
                
            </div>
        </div>