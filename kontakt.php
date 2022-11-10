<?php
$page = basename($_SERVER['PHP_SELF'], '.php');
include 'components/head.php';
include 'components/nav.php';
include 'components/banner.php';

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
    <div class = "abovecontact"></div>
 
    <div class = "contact">
    <h1 class="kontaktieren">Kontaktieren Sie uns!</h1>
    <form class="cs-form cs-message">
    
        <label class="cform" for="name">Name: </label>
        <input type="text" class="field field1" placeholder="Name" name="name" id="name required">
    
        <label  class="cform" for="email">E-Mail-Adresse: </label>
        <input type="email" class="field field2" placeholder="E-Mail-Adresse" name="email" id="email">
    
        <label class="cform" for="telefonnummer">Telefonnummer: </label>
        <input type="text" class="field field3" placeholder="Telefonnummer" name="telefonnummer" id="felefonnummer">
    
        <label class="cform" for="buchungsnummer" >Buchungsnummer: </label>
        <input type="text" class="field field4" placeholder="Buchungsnummer" name="buchungsnummer" id="buchungsnummer">
    
        <label class="cform" for="helfen">Wie können wir Ihnen helfen? </label>
        <textarea class="textarea" rows="5" cols="20" placeholder="Wie können wir Ihnen helfen?" name="helfen" id="helfen"></textarea>
    
        <div class="errors" style= "color:red;">
                <?php 
               foreach($errors as $value){
                echo $value ."<br>";
                }
                ?>
                </div>

        <button class="contactbutton" type="submit">
            Absenden
        </button>
    
    </form>
</div>
    <!--Section end-->
  
    <?php
    include 'components/footer.php';
    ?>
