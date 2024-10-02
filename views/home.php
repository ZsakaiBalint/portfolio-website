<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">


<?php require __DIR__ . '\head.php'; ?>


<body>


<?php require __DIR__ . '\navbar.php'; ?>


<!-- Jumbotron -->
<div class="jumbotron roboto-mono-custom">
    <div class="container">
      <div class="jumbotron-row row">
        <div class="jumbotron-image-div col-12 col-lg-6">
          <img src="images/profile_image.webp" class="jumbotron-image img-fluid img-circle" alt="profile image">
        </div>
        <div class="jumbotron-text col-12 col-lg-6 ">
          <h1>Hi, my name is Bálint Zsákai</h1>
          <h3>I'm a backend-developer,</h3>
          <p>and this is my portfolio website.</p>

            <button onclick="window.location.href='#projects-section';" id="projectsButton" type="button" class="btn btn-secondary btn-lg">
              <i class="fa-solid fa-rocket"></i> 
              <b>View my projects</b>
            </button>

          </div>
        </div>

      </div>
    </div>
</div>


<!-- Quick introduction -->
<div class="container margin-top">
  <div class="flexcontainer row">
    <div class="col-12 margin-auto">
      <h2> <kbd>Welcome to my portfolio!</kbd> </h2>
      <h3 class="roboto-mono-custom">
        I'm a passionate backend developer with over 3 years of experience in designing, developing, 
        and maintaining robust and scalable server-side applications. My expertise lies in leveraging technologies like 
        PHP, Node.js and MySQL to build efficient and secure backend solutions.
      </h3>
    </div>
  </div>
</div>

<!-- Projects section -->
<div id="projects-section" class="container margin-top">
  <div class="flexcontainer row text-center">

    <div class="col-12">
      <h1><i class="fa-solid fa-lightbulb"></i></h1>
      <h2 class="margin-bottom"> <kbd>My projects</kbd></h2>
    </div>
  </div>
</div>

<div class="container">

  <div id="projects" class="flexcontainer row text-center">

    <div class="col-12 col-md-4 col-sm-6 project">
      <a href="/tic_tac_toe">
      <div class="project-inner">
          <img src="images/tic_tac_toe.webp" class="img-fluid img-rounded" alt="profile image">
          <h2 class="bebas-neue-regular"><i class="fa-solid fa-terminal"></i> Multiplayer Tic-Tac-Toe</h2>
          <div class="project-description">
            <h4 class="roboto-mono-custom">
              Challenge your friends or play against the computer!
            </h4>
          </div>
      </div>
      </a>
    </div>

    <!--
    <div class="col-12 col-md-4 col-sm-6 project">
      <a href="/projects/tic_tac_toe">
      <div class="project-inner">
          <img src="images/project1.jpg" class="img-fluid img-rounded" alt="profile image">
          <h2 class="bebas-neue-regular"><i class="fa-solid fa-terminal"></i> Project name 1</h2>
          <div class="project-description">
            <h4 class="roboto-mono-custom">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
              Ut aliquam purus sit amet. 
            </h4>
          </div>
      </div>
      </a>
    </div>
    -->

  </div>
</div>


<!-- Form section -->
<div id="form-section" class="container margin-top">
  <div class="flexcontainer row text-center">

    <div class="col-12">
      <h1><i class="fa-regular fa-message"></i></h1>
      <h2 class="margin-bottom"> <kbd>Send me a message!</kbd></h2>
    </div>
  </div>
</div>

<div class="form container text-center roboto-mono-custom">
  <form method="post" action="../utility/send_email.php">

    <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
        <input type="text" class="form-control" placeholder="John Done" id="inputName" aria-describedby="inputName1" 
        value="<?php 
        echo isset($_SESSION['form_data']['name']) ? htmlspecialchars($_SESSION['form_data']['name']) : ''; 
        ?>">

        <?php 
          if (isset($_SESSION['mail-sending-error']) && !empty($_SESSION['mail-sending-error'])) {
            $containsNameError = !empty(array_filter($_SESSION['mail-sending-error'], fn($error) => stripos($error, 'name') !== false));
    
            if ($containsNameError) {
                echo '<p class="red">^ Name field is mandatory!</p>';
            }
          }
        ?>
    </div>

    <div class="form-group row">
      <label for="inputEmal" class="col-sm-2 col-form-label">Email</label>
      <input type="email" class="form-control" placeholder="johndoe123@fubarmail.com" id="inputEmal">
      <?php 
          if (isset($_SESSION['mail-sending-error']) && !empty($_SESSION['mail-sending-error'])) {
            $containsNameError = !empty(array_filter($_SESSION['mail-sending-error'], fn($error) => stripos($error, 'email') !== false));
    
            if ($containsNameError) {
                echo '<p class="red">^ Email field is mandatory!</p>';
            }
          }
        ?>
    </div>

    <div class="form-group row">
      <label for="inputMessage" class="col-sm-2 col-form-label">Message</label>
      <textarea placeholder="Your message..." class="form-control" id="inputMessage" rows="10"></textarea>
      <?php 
        if (isset($_SESSION['mail-sending-error']) && !empty($_SESSION['mail-sending-error'])) {
          $containsNameError = !empty(array_filter($_SESSION['mail-sending-error'], fn($error) => stripos($error, 'message') !== false));
  
          if ($containsNameError) {
              echo '<p class="red">^ Message field is mandatory!</p>';
          }
        }
      ?>
    </div>

    <div class="form-check eula">
      <input type="checkbox" class="form-check-input" id="inputCheckTerms">
      <label for="inputCheckTerms" class="form-check-label">I accept the <a href="#projects">Terms of Service</a> and <a href="#project">Privacy Policy</a>. </label>
      <?php 
        if (isset($_SESSION['mail-sending-error']) && !empty($_SESSION['mail-sending-error'])) {
          $containsNameError = !empty(array_filter($_SESSION['mail-sending-error'], fn($error) => stripos($error, 'message') !== false));
  
          if ($containsNameError) {
              echo '<p class="red">^ This checkbox is mandatory!</p>';
          }
        }
      ?>
    </div>

    <button type="submit" class="btn btn-primary">Send message</button>

  </form>
</div>






<?php require __DIR__ . '/footer.php'; ?>


</body>

</html>