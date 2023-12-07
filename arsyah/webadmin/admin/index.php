<?php 
    require_once("header.php");
    require_once("sidebar.php");



    if(isset($_GET['homepage']))
    {
        require_once("home.php");
    }else if(isset($_GET['addElectionPage']))
    {
        require_once("add_elections.php");
    }else if(isset($_GET['addCandidatePage']))
    {
        require_once("add_candidates.php");
    }else if(isset($_GET['addVoterPage'])){

        require_once("add_voters.php");
    }else if(isset($_GET['viewResult']))
    {
        require_once("viewResults.php");
    }


?>


<?php 
    require_once("footer.php");
?>