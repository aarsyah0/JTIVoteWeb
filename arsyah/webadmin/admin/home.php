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
                    <img src="../assets/imgs/customer01.jpg" alt="">
                </div>
            </div>

            <!-- ======================= Cards ================== -->
            <div class="tb"><table class="table">
                        <thead>
                            <tr>
                                <th scope="col">S.No</th>
                                <th scope="col">Election Name</th>
                                <th scope="col"># Candidates</th>
                                <th scope="col">Max Vote</th>
                                <th scope="col">Starting Date</th>
                                <th scope="col">Ending Date</th>
                                <th scope="col">Status </th>
                                <th scope="col">Action </th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $fetchingData = mysqli_query($db, "SELECT * FROM elections") or die(mysqli_error($db)); 
                                $isAnyElectionAdded = mysqli_num_rows($fetchingData);

                                if($isAnyElectionAdded > 0)
                                {
                                    $sno = 1;
                                    while($row = mysqli_fetch_assoc($fetchingData))
                                    {
                                        $election_id = $row['id'];
                                        
                            ?>
                                        <tr>
                                            <td><?php echo $sno++; ?></td>
                                            <td><?php echo $row['election_topic']; ?></td>
                                            <td><?php echo $row['no_of_candidates']; ?></td>
                                            <td><?php echo $row['maxvote']; ?></td>
                                            <td><?php echo $row['starting_date']; ?></td>
                                            <td><?php echo $row['ending_date']; ?></td>
                                            <td><?php echo $row['status']; ?></td>
                                            <td> 
                                                <a href="index.php?viewResult=<?php echo $election_id; ?>" class="btn btn-sm btn-success"> View Results </a>
                                            </td>
                                        </tr>
                            <?php
                                    }
                                }else {
                        ?>
                                    <tr> 
                                        <td colspan="7"> No any election is added yet. </td>
                                    </tr>
                        <?php
                                }
                            ?>
                        </tbody>    
                    </table>
                </div>
                <!-- caedview -->
                <div class="container mt-4">
    <?php 
    $fetchingData = mysqli_query($db, "SELECT * FROM elections") or die(mysqli_error($db)); 
    $isAnyElectionAdded = mysqli_num_rows($fetchingData);

    if ($isAnyElectionAdded > 0) {
        while ($row = mysqli_fetch_assoc($fetchingData)) {
            $election_id = $row['id'];
            ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['election_topic']; ?></h5>
                    <p class="card-text">Number of Candidates: <?php echo $row['no_of_candidates']; ?></p>
                    <p class="card-text">Max Votes: <?php echo $row['maxvote']; ?></p>
                    <p class="card-text">Starting Date: <?php echo $row['starting_date']; ?></p>
                    <p class="card-text">Ending Date: <?php echo $row['ending_date']; ?></p>
                    <p class="card-text">Status: <?php echo $row['status']; ?></p>
                    <a href="index.php?viewResult=<?php echo $election_id; ?>" class="btn btn-success">View Results</a>
                </div>
            </div>
            <div class="spacer"></div>
            <?php
        }
    } else {
        ?>
        <div class="alert alert-info" role="alert">
            No election has been added yet.
        </div>
        <?php
    }
    ?>
</div>
            <!-- chart -->
             <!-- Chart Pemilihan -->
            <div style="width: 80%; margin: auto;">
                <canvas id="electionChart"></canvas>
            </div>

             <?php
                // Ambil data dari tabel votings untuk chart
                $fetchingVotesData = mysqli_query($db, "SELECT candidate_id, COUNT(voters_id) as vote_count FROM votings WHERE election_id = '$election_id' GROUP BY candidate_id") or die(mysqli_error($db));

                // Inisialisasi variabel untuk menyimpan data
                $candidateNames = [];
                $voteCounts = [];

                // Proses data dari hasil query
                while ($row = mysqli_fetch_assoc($fetchingVotesData)) {
                    $candidate_id = $row['candidate_id'];
                    $fetchingCandidateName = mysqli_query($db, "SELECT candidate_name FROM candidate_details WHERE id = '$candidate_id'") or die(mysqli_error($db));
                    $candidateData = mysqli_fetch_assoc($fetchingCandidateName);

                    // Simpan data ke dalam array
                    $candidateNames[] = $candidateData['candidate_name'];
                    $voteCounts[] = $row['vote_count'];
                }

                // Konversi array ke format JSON agar dapat digunakan dalam JavaScript
                $candidateNamesJSON = json_encode($candidateNames);
                $voteCountsJSON = json_encode($voteCounts);
                ?>

                <script>
                // Ambil data dari tabel votings untuk chart
                var election_id = <?php echo json_encode($election_id); ?>;
                var candidateNames = <?php echo $candidateNamesJSON; ?>;
                var voteCounts = <?php echo $voteCountsJSON; ?>;

                // Tampilkan Chart menggunakan Chart.js
                var ctx<?php echo $election_id; ?> = document.getElementById('electionChart<?php echo $election_id; ?>').getContext('2d');
                var electionChart<?php echo $election_id; ?> = new Chart(ctx<?php echo $election_id; ?>, {
                    type: 'bar',
                    data: {
                        labels: candidateNames,
                        datasets: [{
                            label: 'Votes',
                            data: voteCounts,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
                </script>




            <!-- ================ Order Details List ================= -->

                <!-- ================= New Customers ================ -->
                
            </div>
        </div>