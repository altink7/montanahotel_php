<?php
$page = basename($_SERVER['PHP_SELF'], '.php');
include 'components/head.php';
include 'components/nav.php';
include 'components/banner.php';

$errors = array();

$password_1 = $password_2 = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["vorname"])) {
    $vorname = $_POST["vorname"];
    }else{
        $errors['nameError']="Name darf nicht leer sein!";
    }
    if(!empty($_POST["username"])){
        $nachname = $_POST["user    name"];
    }else{
        $errors['usernameError']="Username darf nicht leer sein!";
    }

    if (!empty($_POST["email"])) {
    $email = $_POST["email"];
    }else{
        $errors['emailError']="E-Mail darf nicht leer sein!";
    }

    if (!empty($_POST["adresse"])) {
    $adresse = $_POST["adresse"];
    }else{
        $errors['addresseError']="Adresse darf nicht leer sein!";
    }
    
    if (!empty($_POST["euCountries"])) {
    $country = $_POST["euCountries"];
    }else{
        $errors['countryError']="Land darf nicht leer sein!";
    }
    
    if (!empty($_POST["password"])) {
    $password_1= $_POST["password"];
    }else{
        $errors['passwordError']="Passwort darf nicht leer sein!";
    }

    if (!empty($_POST["passwordConfirmed"])) {
    $password_2= $_POST["passwordConfirmed"];
    }else{
        $errors['passwordConfirmedError']="bestätigter Passwort darf nicht leer sein!";
    }
    
    if($password_1!=$password_2){
        $errors['passwordError']= "Passwörter müssen gleich sein!";
    }

    if(empty($errors)){
    header('Location: submit.php'); 
    }
}
?>

    <section>

        <img src="Bilder/section.jpeg" alt="">

        <div class="anmeldefenster">
            <form method="post" action="submit.php">


                <label for="name">Name:</label><br>
                <input type="text" name="vorname" id="name" placeholder="John Doe"
                    pattern="^([\p{Lu}\p{Lt}]\p{Ll}+)\s([\p{Lu}\p{Lt}]\p{Ll}+)+$" size="20" autofocus="">
                <br>
                <label for="username">Username:</label> <br>
                <input type="text" name="username" id="username" placeholder="john.doe" size="20">
                <br>
                <label for="email">E-Mail-Adresse:</label><br>
                <input type="email" name="email" id="email" placeholder="john.doe@gmail.com">
                <br>
                <label for="country">Land:</label><br>
                <select name="euCountries" style="padding-left: 40px;margin-bottom: 25px;">
                    <option value="AT">Austria</option>
                    <option value="BE">Belgium</option>
                    <option value="BG">Bulgaria</option>
                    <option value="DK">Denmark</option>
                    <option value="DE">Germany</option>
                    <option value="EE">Estonia</option>
                    <option value="FI">Finland</option>
                    <option value="FR">France</option>
                    <option value="GR">Greece</option>
                    <option value="IE">Ireland</option>
                    <option value="IT">Italy</option>
                    <option value="LV">Latvia</option>
                    <option value="LT">Lithuania</option>                   
                    <option value="LU">Luxembourg</option>
                    <option value="MT">Malta</option>
                    <option value="NL">Netherlands</option>
                    <option value="PL">Poland</option>
                    <option value="PT">Portugal</option>
                    <option value="RO">Romania</option>
                    <option value="SE">Sweden</option>
                    <option value="SK">Slovakia</option>
                    <option value="SI">Slovenia</option>
                    <option value="ES">Spain</option>
                    <option value="CZ">Czech Republic</option>
                    <option value="HU">Hungary</option>
                    <option value="GB">Great Britain</option>
                    <option value="CY">Cyprus</option>
                </select>
                <br>
                <label for="adresse">Wohnadresse:</label><br>
                <input type="text" name="adresse" id="adresse" placeholder="Web Straße 12/1">
                <br>
                <label for="password">Passwort:</label><br>
                <input type="password" name="password" id="password" minlength="8">
                <br>
                <label for="passwordConfirmed">Passwort bestätigen:</label><br>
                <input type="password" name="passwordConfirmed" id="passwordConfirmed" minlength="8">
                <br>

                <div class="errors" style= "color:red;">
                <?php 
               foreach($errors as $value){
                echo $value ."<br>";
                }
                ?>
                </div>
                <button type="submit">Registrieren</button>

            </form>
        </div>
        <br><br><br>

    </section>
    
    <?php
    include 'components/footer.php';
    ?>

    