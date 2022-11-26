<?php session_start(); ?>
<body>
<nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"> <img src="img/logo.png" width="80" height="70"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-evenly text-center" id="navbarSupportedContent">
                <a class="nav-link <?php echo($page =='news'?'active':'') ?>" href="news.php">News</a>
                <a class="nav-link <?php echo($page =='about'?'active':'') ?>" href="about.php">Über Uns</a>
                <a class="nav-link <?php echo($page =='login'?'active':'') ?>" href="login.php">Login</a>
                <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
                    echo '<a class="nav-link '.($page =="profil"?"active":"").'" href="profil.php">Profil</a>';
                }?>
            
                </div>
            </div>
        </nav>