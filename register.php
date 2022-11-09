<?php
$page = basename($_SERVER['PHP_SELF'], '.php');
include 'components/head.php';
include 'components/nav.php';
include 'components/banner.php';

$password = false;

echo "<pre>"; print_r($_POST); "</pre>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["vorname"])) {
$vorname = $_POST["vorname"];
    }if (!empty($_POST["email"])) {
$email = $_POST["email"];
    }if (!empty($_POST["adresse"])) {
$adresse = $_POST["adresse"];
    }if (!empty($_POST["euCountries"])) {
$country = $_POST["euCountries"];
    }if (!empty($_POST["password_1"])) {
$password_1= $_POST["password_1"];
    }if (!empty($_POST["password_2"])) {
$password_2= $_POST["password_2"];
    }
}
?>

    <section>

        <img src="Bilder/section.jpeg" alt="">

        <div class="anmeldefenster">

            <form action="" method="post">
            
                <label for="name">Name:</label><br>
                <input type="text" name="vorname" id="name" placeholder="John Doe"
                    pattern="^([\p{Lu}\p{Lt}]\p{Ll}+)\s([\p{Lu}\p{Lt}]\p{Ll}+)+$" size="20" autofocus="" required="">
                <br>
                <label for="email">E-Mail-Adresse:</label><br>
                <input type="email" name="email" id="email" placeholder="john.doe@gmail.com" required="">
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
                <input type="text" name="adresse" id="adresse" placeholder="Web Straße 12/1" required="">
                <br>
                <label for="password_1">Passwort:</label><br>
                <input type="password" name="password_1" id="password_1" minlength="8" required>
                <br>
                <label for="password_2">Passwort bestätigen:</label><br>
                <input type="password" name="password_2" id="password_2" minlength="8" required>
                <?php

                if($_POST["password_1"] == $_POST["password_2"]){
                    echo("passt");
                    $password = true;
                }else {
                    echo(" failed 😦");
                 }
                ?>
                <br>

                <!-- <input id="submitButton" type="submit" value="Registrieren"> -->
            
                <button type=" <?php echo($_POST["password_1"] == $_POST["password_2"]?'submit':'button')?> ">Submit</button>
            </form>
        </div>


    </section>
    
    <?php
    include 'components/footer.php';
    ?>