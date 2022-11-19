
<?php
$page = basename($_SERVER['PHP_SELF'], '.php');
include 'components/head.php';
include 'components/nav.php';

$errors = array();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["name"])) {
    $vorname = $_POST["name"];
    }else{
        $errors['nameError']="Name darf nicht leer sein!";
    }

    if (!empty($_POST["email"])) {
    $email = $_POST["email"];
    }else{
        $errors['emailError']="E-Mail darf nicht leer sein!";
    }
    if (!empty($_POST["helfen"])) {
        $email = $_POST["helfen"];
        }else{
            $errors['helfenError']="E-Mail darf nicht leer sein!";
        }
}
?>
    <!--Section start-->
    <div class="bgContact">
    <br><br><br>
    <div class="contact text-center">
        <h1 class="kontaktieren">Kontaktieren Sie uns!</h1><br>
        
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-3">
                    <h5><input type="text" class="field field1" placeholder="Name" name="name" id="name required"></h5>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-3">
                    <h5> <input type="email" class="field field2" placeholder="E-Mail-Adresse" name="email" id="email"></h5>
                 </div>
                <div class="col-lg-3"></div>
            </div>
                <div class="row">
                    <div class="col-lg-2"></div>
                <div class="col-lg-3">
                    <h5><input type="text" class="field field3" placeholder="Telefonnummer" name="telefonnummer" id="felefonnummer"></h5>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-3">
                    <h5><input type="text" class="field field4" placeholder="Buchungsnummer" name="buchungsnummer" id="buchungsnummer"></h5>
                </div>
                <div class="col-lg-3"></div>
             </div>
             <br>
            <div class="row">
                <div class="col-lg-12">
                    <h5>Wie können wir Ihnen helfen?</h5>
                    <textarea name="messages" id="messages" cols="45" rows="5"></textarea>
                </div>
                <div class="col-lg-12">
                    <input type="submit" value="Absenden">
            </div>
        </div>
    </div>
</div>
    <!--Section end-->
  
    <?php
    include 'components/footer.php';
    ?>
