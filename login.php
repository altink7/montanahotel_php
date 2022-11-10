<?php
$page = basename($_SERVER['PHP_SELF'], '.php');
include 'components/head.php';
include 'components/nav.php';
include 'components/banner.php';

$errors = array();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["username"])) {
    $vorname = $_POST["username"];
    }else{
        $errors['usernameError']="Username darf nicht leer sein!";
    }if (!empty($_POST["password"])) {
    $password = $_POST["password"];
    }else{
        $errors['passwordError']="Password darf nicht leer sein!";
    }
    
}

?>

    <section>

        <img src="Bilder/section.jpeg" alt="">

        <div class="anmeldefenster">

            <form action="<?php echo(empty($errors)?"profil.php":""); ?>" method="post">
                <label for="username">Username:</label> <br>
                <input type="text" name="username" id="usernameInput" required="">
                <br>
                <label for="password">Passwort:</label><br>
                <input type="password" name="password" id="password" minlength="8" required>
                <br>

                <div class="errors" style= "color:red;">

                <?php 
               foreach($errors as $value){
                echo $value ."<br>";
                }
                ?>

                </div>
                <input id="submitButton" type="submit" value="Anmelden">

            </form>

            <p>Noch nicht registriert?</p>
            <a id="submitButton" class="register" href="register.php"><input type="button" value="Registrieren"></a>

        </div>


    </section>
    
    <?php
    include 'components/footer.php';
    ?>