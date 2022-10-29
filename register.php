<?php
$page = basename($_SERVER['PHP_SELF'], '.php');
include 'components/head.php';
include 'components/nav.php';
include 'components/banner.php';
?>

    <section>

        <img src="Bilder/section.jpeg" alt="">

        <div class="anmeldefenster">
            <form>
            <br action="">
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
                <label for="passwort">Passwort:</label><br>
                <input type="password" name="passwort" id="password" minlength="8" required>
                <br>
                <label for="passwort">Passwort bestätigen:</label><br>
                <input type="password" name="passwort" id="password2" minlength="8" required>
                <br>
                <input id="submitButton" type="submit" value="Registrieren">

            </form>
        </div>


    </section>
    
    <?php
    include 'components/footer.php';
    ?>