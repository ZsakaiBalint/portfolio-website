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
                        <a href="/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="<?php echo $request === '/about' ? 'active' : ''; ?>">
                        <a href="/about">About me</a>
                    </li>
                    <li>
                        <a href="/projects">Projects</a>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <img src="https://flagcdn.com/16x12/gb.png" srcset="https://flagcdn.com/32x24/gb.png 2x,https://flagcdn.com/48x36/gb.png 3x" width="16" height="12" alt="United Kingdom"> EN
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-fst" href="#"><img src="https://flagcdn.com/16x12/gb.png" srcset="https://flagcdn.com/32x24/gb.png 2x,https://flagcdn.com/48x36/gb.png 3x" width="16" height="12" alt="United Kingdom"> EN</a></li>
                            <li><a class="dropdown-snd" href="#"><img src="https://flagcdn.com/16x12/hu.png" srcset="https://flagcdn.com/32x24/hu.png 2x,https://flagcdn.com/48x36/hu.png 3x" width="16" height="12" alt="Hungary"> HU</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
</div>