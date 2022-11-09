<?php
$page = basename($_SERVER['PHP_SELF'], '.php');
include 'components/head.php';
include 'components/nav.php';
include 'components/banner.php';
?>


    <!--Section start-->
    <div class = "abovecontact"></div>
 
    <div class = "contact">
    <h1 class="kontaktieren">Kontaktieren Sie uns!</h1>
    <form class="cs-form cs-message">
    
        <label class="cform" for="first-name">Name: </label>
        <input type="text" class="field field1" placeholder="Name" name="first-name" id="first-name required">
    
        <label  class="cform" for="last-name">E-Mail-Adresse: </label>
        <input type="email" class="field field2" placeholder="E-Mail-Adresse" name="last-name" id="last-name">
    
        <label class="cform" for="telefonnummer">Telefonnummer: </label>
        <input type="text" class="field field3" placeholder="Telefonnummer" name="telefonnummer" id="felefonnummer">
    
        <label class="cform" for="buchungsnummer" >Buchungsnummer: </label>
        <input type="text" class="field field4" placeholder="Buchungsnummer" name="buchungsnummer" id="buchungsnummer">
    
        <label class="cform" for="helfen">Wie können wir Ihnen helfen? </label>
        <textarea class="textarea" rows="5" cols="20" placeholder="Wie können wir Ihnen helfen?" name="helfen" id="helfen"></textarea>
    
        <button class="contactbutton" type="submit">
            Absenden
        </button>
    
    </form>
</div>
    <!--Section end-->
  
    <?php
    include 'components/footer.php';
    ?>