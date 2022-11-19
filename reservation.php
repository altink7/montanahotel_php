<?php
$page = basename($_SERVER['PHP_SELF'], '.php');
include 'components/head.php';
include 'components/nav.php';
include 'components/banner.php';

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
            <form class="bf-body-box" action="profil.php" method="post">
                <div class="bf-row">
                    <div class="bf-col-6">
                        <p>Anreisedatum
                        <input type="date" name="from-date" id="from-date"></p>
                    </div>
                    <div class="bf-col-6">
                        <p>Abreisedatum
                        <input type="date" name="to-date" id="to-date"></p>
                    </div>
                    <div class="bf-col-6">
                        <select name="room-select">
                            <option>Zimmer auswählen</option>
                            <option value="Mountain Sweet">Mountain Sweet</option>
                            <option value="Ozean Sweet">Ozean Sweet</option>
                            <option value="Deluxe Villa">Deluxe Villa</option>
                            <option value="Ozean Villa">Ozean Villa</option>
                        </select>
                    </div>
                    <input type="checkbox" id="breakfeast" name="breakfast">
                    <label for="breakfeast"> inklusive Frühstück (€ 15 / Tag)</label><br>

                    <input type="checkbox" id="parking" name="parking">
                    <label for="breakfeast"> inklusive Parkplatz (€ 10 / Tag)</label><br>

                    <input type="checkbox" id="pets" name="pets">
                    <label for="pets"> Haustiere?</label><br>
                </div>
                <div class="bf-row">
                    <div class="bf-col-12">
                        <p>Anmerkungen</p>
                        <textarea name="messages" id="messages" cols="10" rows="2"></textarea>
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



