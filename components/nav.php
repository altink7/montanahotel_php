<nav class="navbar navbar-expand-lg bg-light" background-color="black">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"> <img src="img/logo.png" width="90" height="80"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link <?php echo($page =='zimmer'?'active':'') ?>" aria-current="page" href="zimmer.php">Zimmer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo($page =='restaurant'?'active':'') ?>" href="restaurant.php">Restaurant</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo($page =='about'?'active':'') ?>" href="about.php">Über Uns</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo($page =='login'?'active':'') ?>" href="login.php">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>