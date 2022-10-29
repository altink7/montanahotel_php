<?php
$page = basename($_SERVER['PHP_SELF'], '.php');
include 'components/head.php';
include 'components/nav.php';
?>

<body>
    <header>
        <div class="Banner">
            <p>Login</p>
        </div>

    </header>
    <section>

        <img src="Bilder/section.jpeg" alt="">

        <div class="anmeldefenster">
            <form action="">
                <label for="username">Username:</label> <br>
                <input type="text" name="username" id="usernameInput">
                <br>
                <label for="passwort">Passwort:</label><br>
                <input type="password" name="passwort" id="passwortInput">
                <br>
                <input id="submitButton" type="submit" value="Anmelden">

            </form>

            <p>Noch nicht registriert?</p>
            <a id="submitButton" class="register" href="register.php"><input type="button" value="Registrieren"></a>

        </div>


    </section>
    
    <?php
    include 'components/footer.php';
    ?>