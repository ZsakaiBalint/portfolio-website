<!DOCTYPE html>
<html lang="en">

<?php require __DIR__ . '/head.php'; ?>

<body>

<?php require __DIR__ . '/navbar.php'; ?>



<div class="container margin-top">

  <div class="col-12 space-between">
    <button onclick="window.location.href='/projects';" type="button" class="btn btn-secondary btn-lg back-button"><i class="fa-solid fa-arrow-left"></i> Back to all projects</button>
  </div>



  <h1 class="iframe-header"> Multiplayer Tic-Tac-Toe </h1>
  <iframe 
  src="https://codesandbox.io/embed/github/ZsakaiBalint/tic_tac_toe/main?view=preview"
  style="width:100%; height: 500px; border:0; border-radius: 4px; overflow:hidden;"
  title="Tic Tac Toe"
  sandbox="allow-forms allow-modals allow-popups allow-presentation allow-same-origin allow-scripts"
  ></iframe>

  <div class="iframe-footer text-center">
    <button type="button" class="btn btn-success btn-lg"><i class="fa-solid fa-code"></i> View source code</button>
    <button type="button" class="btn btn-info btn-lg"><i class="fa-solid fa-book"></i> View documentation</button>
  </div>

</div>


<div class="container margin-top">
  <div class="flexcontainer row text-center">

    <div class="col-12 margin-auto">
      <h2 class="text-left roboto-mono-custom">Project description</h2>
      <p class="text-left roboto-mono-custom">
        This project is the classic game, Tic-Tac-Toe with 'VS player' and 'VS computer' gamemodes.
        By making this game, I learned how to use sockets (socket.io) in Node.js. Note: you can try
        out the multiplayer gamemode by opening this browser tab again.
      </p>
    </div>

  </div>
</div>








<div class="container margin-top no-padding">

  <div class="col-12 margin-auto">
    <h2 class="text-left roboto-mono-custom">Gallery</h2>
  </div>
    

  <div id="gallery" class="flexcontainer row text-center">

    <div class="col-12 col-md-3 col-sm-6">
      <img src="../images/tic_tac_toe.webp" class="img-fluid img-rounded" alt="profile image" data-toggle="modal" data-target="#exampleModal">
    </div>

    <!--
    <div class="col-12 col-md-3 col-sm-6">
      <img src="../images/tic_tac_toe.webp" class="img-fluid img-rounded" alt="profile image" data-toggle="modal" data-target="#exampleModal">
    </div>
    -->

  </div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h2 class="modal-title" id="exampleModalLabel">tic_tac_toe</h2>

      </div>
      <div class="modal-body">
        <img src="../images/tic_tac_toe.webp" class="img-fluid img-rounded" alt="profile image">
      </div>
      <!--
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
      -->

    </div>
  </div>
</div>





</div>


<!-- Footer -->
<footer class="footer text-center margin-top roboto-mono-custom">
  <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <h3>Contacts</h3>
          <p>email: balintzsakai@gmail.com</p>
          <p>phone: +36 30 24 55 655</p>
          <p>LinkedIn: <a href="https://www.linkedin.com/in/bálint-zsákai" target="_blank">linkedin.com/in/bálint-zsákai</a></p>
          <p>Download my CV here: <a href="documents/Bálint_Zsákai_CV.pdf" target="_blank">Bálint_Zsákai_CV.pdf</a></p>
        </div>
        <div class="col-sm-6">
          <h3>Terms of Service and Privacy Policy</h3>        
          <p>By using this site, you agree to the <a href="documents/Terms_of_service.pdf" target="_blank">Terms of Service</a> and <a href="documents/Privacy_policy.pdf">Privacy Policy</a>.</p>
        </div>
      </div>
    </div>
</footer>


</body>

</html>