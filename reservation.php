<?php
$page = basename($_SERVER['PHP_SELF'], '.php');
include 'components/head.php';
include 'components/nav.php';
include 'components/banner.php';

?>

<br><br><br>
    <div class="bf-container text-center">
        <div class="bf-body">
            <div class="bf-head">
                <h1>Buche jetzt deinen Aufenthalt bei Montana!</h1><br>
            </div>
            <form class="bf-body-box" action="profil.php" method="post">
                <div class="bf-row">
                    <div class="bf-col-6">
                        <h4>Anreisedatum
                        <input type="date" name="from-date" id="from-date"></h4>
                    </div>
                    <div class="bf-col-6">
                        <h4>Abreisedatum
                        <input type="date" name="to-date" id="to-date"></h4>
                    </div> <br>
                    <div class="bf-col-6 h4">
                        <select name="room-select">
                            <option class="rselect">Zimmer auswählen</option>
                            <option value="Mountain Sweet">Mountain Sweet</option>
                            <option value="Ozean Sweet">Ozean Sweet</option>
                            <option value="Deluxe Villa">Deluxe Villa</option>
                            <option value="Ozean Villa">Ozean Villa</option>
                        </select>
                    </div> <br>
                    <input type="checkbox" id="breakfeast" name="breakfast">
                    <label for="breakfeast"><h4> inklusive Frühstück (€ 15 / Tag) </h4></label><br>

                    <input type="checkbox" id="parking" name="parking">
                    <label for="breakfeast"><h4> inklusive Parkplatz (€ 10 / Tag)</h4></label><br>

                    <input type="checkbox" id="pets" name="pets">
                    <label for="pets"> <h4>Haustiere?</h4></label><br><br>
                </div>
                <div class="bf-row">
                    <div class="bf-col-12">
                        <h4>Anmerkungen</h4>
                        <textarea name="messages" id="messages" cols="75" rows="5"></textarea>
                    </div>
                </div>
                <div class="bf-row">
                    <div class="bf-col-3">
                        <input type="submit" value="Buchen">
                    </div>
                </div>
            </form>
        </div>
    </div>
    
<?php
include 'components/footer.php';
?>



