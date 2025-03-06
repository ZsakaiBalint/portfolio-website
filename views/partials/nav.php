
<div class="container navbar-container">
    <nav class="navbar navbar-expand-md">
        <div class="container-fluid">

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
            </div>

        </div>
    </nav>
</div>

