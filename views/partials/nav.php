
<div class="container navbar-container">
   <nav class="navbar navbar-expand-md navbar-dark bg-primary">
    <div class="container-fluid">
        
        <a class="navbar-brand abs" href="/">
            <img src="images/logo.png" alt="Your Logo" class="img-fluid" style="max-width: 150px; max-height: 40px;">
        </a>
        
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="collapseNavbar">
            <ul class="navbar-nav">
                <li class="nav-item <?php echo ($_SERVER['REQUEST_URI'] == '/' ? 'active' : ''); ?>">
                    <a class="nav-link" href="/">Kezdőlap</a>
                </li>
                <li class="nav-item <?php echo ($_SERVER['REQUEST_URI'] == '/about' ? 'active' : ''); ?>">
                    <a class="nav-link" href="/about">Rólam</a>
                </li>
                <li class="nav-item <?php echo ($_SERVER['REQUEST_URI'] == '/blog' ? 'active' : ''); ?>">
                    <a class="nav-link" href="blog">Blog</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/login">Bejelentkezés</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/registration">Regisztráció</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
</div>

