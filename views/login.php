<?php 
require "partials/head.php"; 
?>


<body>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-ND5QSB5K"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div class="container mt-5">

    <!-- Logo at the top -->
    <div class="text-center mb-5">
        <a href="/">
            <img src="/images/logo.png" alt="Your Logo" class="img-fluid" style="max-width: 150px;">
        </a>
    </div>

    <h2 class="text-center mb-5">Bejelentkezés</h2>

    <!-- Error Message -->
    <?php if (isset($_GET['status']) && $_GET['status'] === 'failure'): ?>
        <div class="alert alert-danger text-center">
            Helytelen felhasználónév vagy jelszó. Próbáld újra!
        </div>
    <?php endif; ?>
    
    <form action="/includes/database-handling/login.php" method="POST" class="form-login">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group mt-3">
                    <label for="username">Felhasználónév</label>
                    <input type="text" id="username" name="username" class="form-control" required>
                </div>

                <div class="form-group mt-3">
                    <label for="password">Jelszó</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>

                <div class="form-group text-center mt-3">
                    <button type="submit" class="btn btn-primary btn-md">Bejelentkezés</button>
                </div>
                
                <!-- Forgot password link -->
                <div class="form-group text-center mt-5">
                    <a href="forgot-password.php" class="text-muted">Elfelejtetted a jelszavad?</a>
                </div>
            </div>
        </div>
    </form>
</div>


</body>