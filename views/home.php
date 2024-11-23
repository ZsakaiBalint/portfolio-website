<?php
session_start();

if(!defined('APP_ACCESS')) { 
    http_response_code(404);
    header("Location: /error");
    die();
}
?>

<?php 
require "partials/head.php";
?>

<?php 
require "partials/nav.php";
?>

<body>

<div class="jumbotron roboto-mono-custom">
    <div class="container">
      <div class="jumbotron-row row">
        <div class="jumbotron-image-div col-12 col-lg-6">
          <img src="images/profile_image.webp" class="jumbotron-image img-fluid img-circle" alt="profile image">
        </div>
        <div class="jumbotron-text col-12 col-lg-6 ">
          <h1>Zsákai Bálint</h1>
          <h3>szoftverfejlesztő informatikus</h3>
          <p>Ezt az oldal arra szolgál, hogy bemutassam a portfolio munkáimat</p>

            <button onclick="window.location.href='#projects-section';" id="projectsButton" type="button" class="btn btn-secondary btn-lg">
              <i class="fa-solid fa-rocket"></i> 
              <b>Tekintsd meg <br> a munkáimat</b>
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
      <h2> <kbd>Üdvözöllek a portfolio oldalamon!</kbd> </h2>
      <h3 class="roboto-mono-custom">
        Több, mint 3 éves tapasztalattal rendelkezek backend fejlesztésben (szerveroldali webfejlesztésben).
        Olyan technológiákat használok a munkám során mint PHP, JavaScript és MySQL. 
      </h3>
    </div>
  </div>
</div>

<!-- Projects section -->
<div id="projects-section" class="container margin-top">
  <div class="flexcontainer row text-center">

    <div class="col-12">
      <h1><i class="fa-solid fa-lightbulb"></i></h1>
      <h2 class="margin-bottom"> <kbd>A munkáim</kbd></h2>
    </div>
  </div>
</div>

<div class="container">

  <div id="projects" class="flexcontainer row text-center">

  

  <div class="container-fluid project">
    <a href="/tic_tac_toe">
        <div class="row project-inner">
            <div class="col-12 col-md-6 image-column"> <!-- Use col-12 for small screens -->
                <img src="../images/tic_tac_toe.webp" class="img-fluid img-rounded" alt="profile image">
            </div>
            <div class="col-12 col-md-6 text-column"> <!-- Use col-12 for small screens -->

                <div>
                  <h2 class="bebas-neue-regular project-name"><i class="fa-solid fa-terminal"></i> Többrésztvevős amőba</h2>
                  <div class="project-description">
                      <h4 class="roboto-mono-custom">
                          Hívd ki a barátaidat, vagy játssz a gép ellen egy izgalmas amőba játékban!
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
            <h2 class="margin-bottom"> <kbd>Küldj üzenetet</kbd></h2>
        </div>
    </div>
</div>


<?php
$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];
?>

<div class="form container text-center roboto-mono-custom">
<form method="post" action="includes/form-handling/formhandler.php">
    <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">Név</label>
        <input type="text" name="name" class="form-control" placeholder="Gipsz Jakab" id="inputName"
            value="<?php echo htmlspecialchars($old['name'] ?? ''); ?>">

        <?php 
          if (!empty($errors['name'])) {
            echo "<p class='red'>" . htmlspecialchars($errors['name']) . "</p>";
          }
        ?>
    </div>

    <div class="form-group row">
        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
        <input type="email" name="email" class="form-control" placeholder="gipsz.jakab@gmail.com" id="inputEmail"
        value="<?php echo htmlspecialchars($old['email'] ?? ''); ?>">

        <?php 
        // Display error message only after form submission and if there's an "EMAIL" error
        if (!empty($errors['email'])) {
          echo "<p class='red'>" . htmlspecialchars($errors['email']) . "</p>";
        }
        ?>
    </div>

    <div class="form-group row">
        <label for="inputMessage" class="col-sm-2 col-form-label">Üzenet</label>
        <textarea name="message" class="form-control" placeholder="Az üzenet..." id="inputMessage" rows="10"><?php echo htmlspecialchars($old['message'] ?? ''); ?></textarea>

        <?php 
        if (!empty($errors['message'])) {
          echo "<p class='red'>" . htmlspecialchars($errors['message']) . "</p>";
        }
        ?>
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Üzenet elküldése</button>
</form>
</div>

<?php
unset($_SESSION['old'], $_SESSION['errors']);
?>



<?php 
require "partials/footer.php";
?>


</body>
