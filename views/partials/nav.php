<?php
if(!defined('APP_ACCESS')) { 
    http_response_code(404);
    header("Location: /error");
    die();
}
?>

<!-- Navbar -->
<div class="container navbar-container">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="<?php echo $request === '/' ? 'active' : ''; ?>">
                        <a href="/">Kezdőlap <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="<?php echo $request === '/about' ? 'active' : ''; ?>">
                        <a href="/about">Rólam</a>
                    </li>
                    <li class="<?php echo $request === '/about' ? 'active' : ''; ?>">
                        <a href="/blog">Cikkek</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
</div>