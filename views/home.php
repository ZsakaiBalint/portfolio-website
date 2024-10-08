<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">


<?php require __DIR__ . '/head.php'; ?>


<body>


<?php require __DIR__ . '/navbar.php'; ?>


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

  

  <div class="container-fluid project">
    <a href="/tic_tac_toe">
        <div class="row project-inner">
            <div class="col-12 col-md-6 image-column"> <!-- Use col-12 for small screens -->
                <img src="images/tic_tac_toe.webp" class="img-fluid img-rounded" alt="profile image">
            </div>
            <div class="col-12 col-md-6 text-column"> <!-- Use col-12 for small screens -->

                <div>
                  <h2 class="bebas-neue-regular"><i class="fa-solid fa-terminal"></i> Multiplayer Tic-Tac-Toe</h2>
                  <div class="project-description">
                      <h4 class="roboto-mono-custom">
                          Challenge your friends or play against the computer!
                      </h4>
                  </div>
                </div>
                
            </div>
        </div>
      </a>
  </div>

  </div>
</div>





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
        <input type="text" name="name" class="form-control" placeholder="John Done" id="inputName"
            value="<?php echo isset($_SESSION['form_data']['name']) ? htmlspecialchars($_SESSION['form_data']['name']) : ''; ?>">

        <?php 
        // Display error message only after form submission and if there's a "NAME" error
        if ($_SERVER["REQUEST_METHOD"] == "POST" && in_array("NAME", $_SESSION['mail-sending-error'])) {
            echo '<p class="red">^ Name field is mandatory!</p>';
        }
        ?>
    </div>

    <div class="form-group row">
        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
        <input type="email" name="email" class="form-control" placeholder="johndoe123@fubarmail.com" id="inputEmail"
            value="<?php echo isset($_SESSION['form_data']['email']) ? htmlspecialchars($_SESSION['form_data']['email']) : ''; ?>">

        <?php 
        // Display error message only after form submission and if there's an "EMAIL" error
        if ($_SERVER["REQUEST_METHOD"] == "POST" && in_array("EMAIL", $_SESSION['mail-sending-error'])) {
            echo '<p class="red">^ Email field is mandatory and must be valid!</p>';
        }
        ?>
    </div>

    <div class="form-group row">
        <label for="inputMessage" class="col-sm-2 col-form-label">Message</label>
        <textarea name="message" class="form-control" placeholder="Your message..." id="inputMessage" rows="10"><?php 
            echo isset($_SESSION['form_data']['message']) ? htmlspecialchars($_SESSION['form_data']['message']) : ''; 
        ?></textarea>

        <?php 
        // Display error message only after form submission and if there's a "MESSAGE" error
        if ($_SERVER["REQUEST_METHOD"] == "POST" && in_array("MESSAGE", $_SESSION['mail-sending-error'])) {
            echo '<p class="red">^ Message field is mandatory!</p>';
        }
        ?>
    </div>

    <button type="submit" class="btn btn-primary">Send message</button>
</form>
</div>






<?php require __DIR__ . '/footer.php'; ?>


</body>

</html>