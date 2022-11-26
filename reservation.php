<?php
$page = basename($_SERVER['PHP_SELF'], '.php');
include 'components/head.php';
include 'components/nav.php';


?>

<div class="Form">
    <div class="bf-container text-center">
        <div class="bf-body">
            <div class="bf-head">
                <h2>Buche jetzt deinen Aufenthalt bei Montana!</h2><br>
            </div>
            <form class="bf-body-box" action="profil.php" method="post">
                <div class="bf-row">
                    <div class="bf-col-lg-6">
                        <h5>Anreisedatum
                        <input type="date" name="from-date" id="from-date"></h5>
                    </div>
                    <div class="bf-col-lg-6">
                        <h5>Abreisedatum
                        <input type="date" name="to-date" id="to-date"></h5>
                    </div> <br>
                    <div class="bf-col-lg-6 h5">
                        <select name="room-select">
                            <option class="rselect" value="keine Auswahl">Zimmer auswählen</option>
                            <option value="Mountain Sweet">Mountain Sweet</option>
                            <option value="Ozean Sweet">Ozean Sweet</option>
                            <option value="Deluxe Villa">Deluxe Villa</option>
                            <option value="Ozean Villa">Ozean Villa</option>
                        </select>
                    </div> <br>
                    <input type="checkbox" id="breakfeast" name="breakfast">
                    <label for="breakfeast"><h5> inklusive Frühstück (€ 15 / Tag) </h5></label><br>

                    <input type="checkbox" id="parking" name="parking">
                    <label for="breakfeast"><h5> inklusive Parkplatz (€ 10 / Tag)</h5></label><br>

                    <input type="checkbox" id="pets" name="pets">
                    <label for="pets"> <h5>Haustiere?</h5></label><br><br>
                </div>
                <div class="bf-row">
                    <div class="bf-col-lg-12">
                        <h5>Anmerkungen</h5>
                        <textarea name="messages" id="messages" cols="40" rows="5"></textarea>
                    </div>
                </div>
                <div class="bf-row">
                    <div class="bf-col-lg-3">
                        <input type="submit" value="Buchen">
                    </div>
                </div>
            </form>
           
        </div>
    </div>
</div>
<?php
include 'components/footer.php';
?>



