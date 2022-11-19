<?php
$page = basename($_SERVER['PHP_SELF'], '.php');
include 'components/head.php';
include 'components/nav.php';
?>

<body>
    <!-- This is main Form Area Start ++ -->
    <div class="bf-container text-center">
        <!-- Main form Body Start -->
        <div class="bf-body">
            <!-- Form haed -->
            <div class="bf-head">
                <p>Buche jetzt deinen Aufenthalt bei Montana!</p>
            </div>
            <!-- Form haed -->
            <!-- Form Body Box -->
            <form class="bf-body-box" action="form.php">
                <div class="bf-row">
                    <div class="bf-col-6">
                        <p>Anreisedatum
                        <input type="date" name="date" id="date"></p>
                    </div>
                    <div class="bf-col-6">
                        <p>Abreisedatum
                        <input type="date" name="date" id="date"></p>
                    </div>
                    <div class="bf-col-6">
                        <select name="s-select">
                            <option>Zimmer auswählen</option>
                            <option value="1">Mountain Sweet</option>
                            <option value="2">Ozean Sweet</option>
                            <option value="3">Deluxe Villa</option>
                            <option value="4">Ozean Villa</option>
                        </select>
                    </div>
                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
<label for="vehicle1"> inklusive Frühstück (€ 15 / Tag)</label><br>
<input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
<label for="vehicle2"> inklusive Parkplatz (€ 10 / Tag)</label><br>
<input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
<label for="vehicle3"> Haustiere?</label><br>
                </div>
                <div class="bf-row">
                    <div class="bf-col-12">
                        <p>Anmerkungen</p>
                        <textarea name="Messages" id="Messages" cols="10" rows="2"></textarea>
                    </div>
                </div>
                <div class="bf-row">
                    <div class="bf-col-3">
                        <input type="submit" value="Submit">
                    </div>
                </div>
            </form>
            <!-- Form Body Box -->
        </div>
        <!-- Main form Body End -->
    </div>
    <!-- This is main Form Area  End -->
</body>
<?php
include 'components/footer.php';
?>



