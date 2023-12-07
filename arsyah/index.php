<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--==================== FAVICON ====================-->
    <link rel="icon" href="assets/img/image 2.png" />
    <!--========== BOX ICONS LIBRARY ==========-->
    <link
      href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css"
      rel="stylesheet"
    />
    <!-- Chartjs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!--========== CSS ==========-->
    <link rel="stylesheet" href="assets/css/styles.css" />
    <!--========== Title ==========-->
    <title>JTI VOTE</title>

    <!--================== LINK THUMBNAIL META TAGS ===================-->
    <!-- MS Tile - for Microsoft apps-->
    <meta
      
    />
    <!-- fb & Whatsapp -->
    <meta property="og:site_name" content="Uber Eats" />
    <meta property="og:title" content="🥗 Delivery de comida | Uber Eats" />
    <meta
      property="og:description"
      content="Restaurantes e mercados próximos de você! "
    />
    <!-- IMG URL: -->
    <meta
      property="og:image"
      content="https://raw.githubusercontent.com/Thiagoow/UberEats-Responsive-LandingPage/master/assets/img/ThumbnailLinkImg.jpg"
    />
    <meta property="og:type" content="website" />
    <meta property="og:image:type" content="image/jpeg" />
    <!--  size up to 300px. Anything above this will not work in WhatsApp -->
    <meta property="og:image:width" content="300" />
    <meta property="og:image:height" content="300" />
    <meta property="og:url" content="https://eats-uber.netlify.app" />
  </head>
  <body>
    <!--========== SCROLL TOP ==========-->
    <a href="#" class="scrollTop show-scroll" id="scroll-top">
      <i class="bx bx-chevron-up scrollTop_icon"></i>
    </a>

    <!--========== HEADER ==========-->
    <header class="l-header" id="header">
      <nav class="nav bd-container">
        <a href="webadmin/index.php" class="nav_logo">
          <img src="assets/img/image 2.png" alt="" class="lg">
          <b>
            
            JTI Vote
            <span></span>
          </b>
        </a>

        <div class="nav_menu" id="nav-menu">
          <ul class="nav_list">
            <li class="nav_item">
              <a href="#home" class="nav_link">Home</a>
            </li>
            <li class="nav_item">
              <a href="#about" class="nav_link">About Us</a>
            </li>
            <li class="nav_item">
              <a href="#contact" class="nav_link">Contact Us</a>
            </li>

            <li><i class="bx bx-moon change-theme" id="theme-button"></i></li> 
          </ul>
        </div>

        <div class="nav_toggle" id="nav-toggle">
          <!--When clicked activate the class "opened"
          to the button tag as well to the 4 SVG lines-->
          <button
            class="menu"
            aria-label="Abrir Menu"
            onclick="this.classList.toggle('opened');this.setAttribute('aria-expanded', this.classList.contains('opened'))"
          >
            <svg width="40" height="41" viewBox="0 0 100 100">
              <path
                class="line line1"
                d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058"
              />
              <path class="line line2" d="M 20,50 H 80" />
              <path
                class="line line3"
                d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942"
              />
            </svg>
          </button>
        </div>
      </nav>
    </header>

    <main class="l-main">
      <!--========== HOME ==========-->
      <section class="home" id="home">
        <div class="home_container bd-container bd-grid">
          <div class="home_data">
            <h1 class="home_title">JTI Voting Online</h1>
            <h2 class="home_subtitle">
              Create options to vote,view voting progress and view the finalize
                data Online with us.
            </h2>
            <a href="#foods" class="button">View Ongoing Votes</a>
          </div>

          <img
            src="assets/img/Mask group (1).png"
            alt="Prato de comida saudável"
            class="home_img"
          />
        </div>
      </section>

      <!--========== ABOUT ==========-->
      <section class="about section bd-container" id="about">
        <div class="about_container bd-grid">
          <div class="ab">
            <img
            src="assets/img/pj.png"
            alt="Ingredientes naturais"
            class="about_img"
          />
            <Span>JTI VOTE</Span>
          </div>
          <div class="about_data">
            <!-- <span class="section-subtitle about_initial">Sobre Nós</span> -->
            <h2 class="section-title about_initial">About Us JTI Vote</h2>
            <p class="about_description">
              Welcome to JTI Vote! We are a dedicated platform committed to
              facilitating transparent and accessible voting for the JTI Major.
              Our mission is to empower every member of the JTI community by
              providing an easy-to-use, secure, and efficient online voting
              system. At JTI Online Voting, we value your voice and your vote.
              Join us in shaping the future of the JTI Major - because
              every vote counts!
            </p>
            <a href="#app" class="button">Download our mobile app Here!
            </a>
          </div>

          
          
          
        </div>
      </section>

      <!--========== SERVICES ==========-->
    <!-- ... (bagian HTML sebelumnya) ... -->

<section class="services section bd-container" id="services">
  <span class="section-subtitle">Ongoing Votes</span>
  <h2 class="section-title">See Ongoing Votes Here</h2>


      <div id="votingChartContainer" class="chart-container" style="display: flex; justify-content: center; align-items: center; margin-top: 20px;">
      <style>
  .chart-container {
    margin: 0 10px; /* Sesuaikan margin kiri dan kanan antar chart */
    padding: 10px; /* Sesuaikan padding di dalam setiap chart-container */
  }
</style>

<?php
  $db = mysqli_connect("jti-vote.tifint.myhost.id", "tifintmy_jtivote", "@JTIpolije2023", "tifintmy_jtivote");

  if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $query = "SELECT candidate_name, election_topic, COUNT(voters_id) AS vote_count
            FROM votings 
            JOIN candidate_details ON votings.candidate_id = candidate_details.id
            JOIN elections ON votings.election_id = elections.id
            GROUP BY votings.candidate_id, votings.election_id, elections.election_topic";

  $result = mysqli_query($db, $query);

  // Check if the query was successful
  if (!$result) {
    die("Query failed: " . mysqli_error($db));
  }

  $data = array();
  while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
  }

  // Free the result set
  mysqli_free_result($result);

  // Close the database connection
  mysqli_close($db);

  $jsonData = json_encode($data);
?>


<script>
  document.addEventListener("DOMContentLoaded", function () {
    const data = <?php echo $jsonData; ?>;
    const electionTopics = [...new Set(data.map(entry => entry.election_topic))];
    const container = document.getElementById('votingChartContainer');

    electionTopics.forEach((topic, index) => {
      const topicData = data.filter(entry => entry.election_topic === topic);
      const candidates = topicData.map(entry => entry.candidate_name);
      const voteCounts = topicData.map(entry => entry.vote_count);

      // Create a container div for each chart
      const chartContainer = document.createElement('div');
      chartContainer.className = 'chart-container';
      container.appendChild(chartContainer);

      // Create a title for each chart
      const chartTitle = document.createElement('h3');
      chartTitle.textContent = topic; // Judul sesuai dengan election_topic
      chartContainer.appendChild(chartTitle);

      // Create a canvas for each chart
      const canvas = document.createElement('canvas');
      canvas.width = 400;
      canvas.height = 300;
      chartContainer.appendChild(canvas);

      const ctx = canvas.getContext('2d');
      const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: candidates,
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
    });
  });
</script>

      </div>
    </div>
  </div>
</section>

<!-- ... (bagian HTML setelahnya) ... -->



      <!--========== FOODS ==========-->
      <section class="foods section bd-container" id="foods">
        <span class="section-subtitle">Our Features</span>
        <h2 class="section-title">Website and Mobile</h2>

        <div class="foods_container bd-grid">
          <div class="foods_content">
            <img src="assets/img/Rectangle 12.png" alt="" class="foods_img" />
            <h3 class="foods_name">Track the vote count</h3>
            <span class="foods_detail">Ride the election wave with live updates on the ongoing vote count. We keep you in the loop, so you're always in the know.
            </span>
            <!-- <span class="foods_price">R$25.00</span> -->

            <!-- <a href="#" class="button foods_button">
              <i class="bx bx-cart"></i>
            </a> -->
          </div>

          <div class="foods_content">
            <img src="assets/img/Rectangle 32.png" alt="" class="foods_img" />
            <h3 class="foods_name">View the election results</h3>
            <span class="foods_detail">View the results of the election, providing a clear and concise presentation of the outcome.</span>
            <!-- <span class="foods_price">R$20.00</span> -->

            <!-- <a href="#" class="button foods_button">
              <i class="bx bx-cart"></i>
            </a> -->
          </div>

          <div class="foods_content">
            <img src="assets/img/Rectangle 286.png" alt="" class="foods_img" />
            <h3 class="foods_name">Fast and Simple Vote</h3>
            <span class="foods_detail">Casting your vote is a breeze with our easy-peasy interface. Just a few taps, and your voice is heard.
</span>
            <!-- <span class="foods_price">R$16.00</span> -->

            <!-- <a href="#" class="button foods_button">
              <i class="bx bx-cart"></i>
            </a> -->
          </div>
        </div>
      </section>

      <!--===== APP =======-->
      <section class="app section bd-container" id="app">
        <div class="app_container bd-grid">
          <div class="app_data">
            <span class="section-subtitle app_initial">Download Our App!</span>
            <h2 class="section-title app_initial">Interested? Install our voting app Now!</h2>
            <p class="app_description">
            Don't miss out on the opportunity to enhance your voting experience with our cutting-edge Online Voting application. It offers a user-friendly interface, swift operation, and robust security measures to safeguard your vote's integrity. Embrace this digital platform to conveniently exercise your democratic rights and stay at the forefront of secure and efficient voting practices.
            </p>
            <div class="app_stores">
              <a href="#"
                ><img
                  src="assets/img/playStoreDownload.png"
                  alt=""
                  class="app_store"
              /></a>
              <a href="#"
                ><img
                  src="assets/img/appStoreDownload.svg"
                  alt=""
                  class="app_store"
              /></a>
            </div>
          </div>

          <img src="assets/img/hp.png" alt="" class="app_img" />
        </div>
      </section>

      <!--========== CONTACT US ==========-->
      <section class="contact section bd-container" id="contact">
  <div class="contact_container bd-grid">
    <div class="contact_data">
      <span class="section-subtitle contact_initial">CONTACT</span>
      <h2 class="section-title contact_initial">Contact Us</h2>
      <p class="contact_description">
        <div class="maps" data-aos="fade-up">
          <iframe style="border: 0; width: 100%; height: 100%;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.4474885898035!2d113.71827588885498!3d-8.157588599999993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd695b6ea0e8375%3A0x4618d7137a4cf5c1!2sGedung%20Jurusan%20TI%20Politeknik%20Negeri%20Jember!5e0!3m2!1sid!2sid!4v1700635035502!5m2!1sid!2sid" frameborder="0" allowfullscreen></iframe>
        </div>
      </p>
    </div>

    <div class="contact_button">
      <!-- <a href="#" class="button">Entrar em Contato</a> -->
    </div>
  </div>
</section>

    </main>

    <!--========== FOOTER ==========-->
    <footer class="footer section bd-container">
      <div class="footer_container bd-grid">
        <div class="footer_content">
          <b class="footer_logo">
            JTI
            <span>Vote</span>
          </b>

          <span class="footer_description">Layanan terbaik, untuk anda. </span>

          <div>
            <a href="#" class="footer_social"
              ><i class="bx bxl-instagram"></i
            ></a>
            <a href="#" class="footer_social"
              ><i class="bx bxl-facebook"></i
            ></a>
            <a href="#" class="footer_social"><i class="bx bxl-twitter"></i></a>
          </div>
        </div>

        <div class="footer_content">
          <h3 class="footer_title">Information</h3>
          <ul>
            <li><a href="#" class="footer_link">Mengunduh</a></li>
            <li><a href="#" class="footer_link">Kebijakan Privasi</a></li>
            <li><a href="#" class="footer_link">Persyaratan Layanan</a></li>
          </ul>
        </div>

        <div class="footer_content">
          <h3 class="footer_title">Address</h3>
          <ul>
            <li>Politeknik Negeri Jember</li>
            <li>Jl. Mastrip POBOX 164 </li>
            <li>Jember, Jawa Timur, Indonesia</li>
          </ul>
        </div>

        <div class="footer_content">
          <h3 class="footer_title">About Us</h3>
          <ul>
            <!-- <li><a href="#app" class="footer_link">Download</a></li>
            <li><a href="#contact" class="footer_link">Contact Us</a></li> -->

            <p>email : (0331) 333533
              <p> call : politeknik@polije.ac.id

              </p>
            </p>
          </ul>
        </div>
      </div>

      <p class="footer_copy">
        &#169; Kelompok 1 2023,
        <a
          href="https://github.com/Thiagoow/UberEats-Responsive-LandingPage"
          class="footer_link"
          target="_blank"
        >
          TIF-INTERNASIONAL
        </a>
      </p>
    </footer>

    <!--========== SCROLL REVEAL LIBRARY ==========-->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!--========== MAIN JS ==========-->
    <script src="assets/js/main.js"></script>
  </body>
</html>
