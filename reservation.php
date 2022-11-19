<?php
$page = basename($_SERVER['PHP_SELF'], '.php');
include 'components/head.php';
include 'components/nav.php';
?>

<div class = "abovecontact"></div>
    <div class = "contact">
    <h1 class="kontaktieren">Buchen Sie jetzt Ihren Aufenthalt bei Montana!</h1>
    <form class="cs-form cs-message">
    
        <label class="cform" for="name">Name: </label>
        <input type="text" class="field field1" placeholder="Name" name="name" id="name required">
    
        <label  class="cform" for="email">E-Mail-Adresse: </label>
        <input type="email" class="field field2" placeholder="E-Mail-Adresse" name="email" id="email">
    
        <label class="cform" for="telefonnummer">Telefonnummer: </label>
        <input type="text" class="field field3" placeholder="Telefonnummer" name="telefonnummer" id="felefonnummer">

        <select class="cform" name="s-select">
            <option>Zimmer auswählen</option>
            <option value="1">Mountain Sweet</option>
            <option value="2">Ozean Sweet</option>
            <option value="3">Deluxe Villa</option>
            <option value="4">Ozean Villa</option>
        </select>
    
        <label class="cform" for="telefonnummer">Anreisedatum </label>
        <input type="date" class="field field3" placeholder="Anreisedatum" name="date" id="date">
        <label class="cform" for="telefonnummer">Anreisedatum </label>
        <input type="date" class="field field3" placeholder="Anreisedatum" name="date" id="date">
                
        <input type="checkbox" id="fruehtstueck" name="fruehtstueck" value="fruehtstueck">
        <label for="fruehtstueck">inklusive Frühstück (€ 15 / Tag)</label>
        <input type="checkbox" id="parkplatz" name="parkplatz" value="parkplatz">
        <label for="parkplatz">inklusive Parkplatz (€ 10 / Tag)</label>
        <input type="checkbox" id="haustiere" name="haustiere" value="haustiere">
        <label for="haustiere">Haustiere?</label>
        
                    
        <label class="cform" for="helfen">Anmerkungen </label>
        <textarea class="textarea" rows="5" cols="20" placeholder="Möchten Siw uns noch etwas mitteilen?" name="helfen" id="helfen"></textarea>
    
       
        <button class="contactbutton" type="submit">
            Absenden
        </button>
</div>

    </form>

<?php
include 'components/footer.php';
?>



