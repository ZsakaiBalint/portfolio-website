<?php 
require "partials/head.php"; 
?>

<div class="container mt-5">
    <!-- Logo at the top -->
    <div class="text-center mb-5">
        <a href="/">
            <img src="/images/logo.png" alt="Your Logo" class="img-fluid" style="max-width: 150px;">
        </a>
    </div>

    <h2 class="text-center mb-5">Regisztráció</h2>
    
    <form action="includes/database-handling/register.php" method="POST" class="form-login">
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

                <!-- Terms and Conditions Checkbox with Link -->
                <div class="form-group mt-3">
                    <label class="form-check-label" for="terms">
                        <input type="checkbox" id="terms" name="terms" class="form-check-input" required>
                        Elfogadom a <a href="/documents/Felhasználói_feltételek.pdf" target="_blank">felhasználási feltételeket</a> 
                        és az <a href="/documents/Adatvédelmi_irányelvek.pdf" target="_blank">adatvédelmi irányelveket</a>.
                    </label>
                </div>

                <!-- Submit Button -->
                <div class="form-group text-center mt-5">
                    <button type="submit" class="btn btn-primary btn-md">Regisztráció</button>
                </div>
            </div>
        </div>
    </form>
</div>
