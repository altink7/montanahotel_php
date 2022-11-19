<?php
$page = basename($_SERVER['PHP_SELF'], '.php');
include 'components/head.php';
include 'components/nav.php';
?>

<body>
    <!-- This is main Form Area Start ++ -->
    <div class="bf-container">
        <!-- Main form Body Start -->
        <div class="bf-body">
            <!-- Form haed -->
            <div class="bf-head">
                <h1>Zimmer Buchen</h1>
                <p>Buche jetzt deinen Aufenthalt bei Montana!</p>
            </div>
            <!-- Form haed -->
            <!-- Form Body Box -->
            <form class="bf-body-box" action="form.php">
                <div class="bf-row">
                    <div class="bf-col-6">
                        <input type="text" name="name" id="name" placeholder="Name">
                    </div>
                    <div class="bf-col-6">
                        <input type="email" name="email" id="email" placeholder="E-Mail-Adresse">
                    </div>
                </div>
                <div class="bf-row">
                    <div class="bf-col-6">
                        <p>Anreisedatum</p>
                        <input type="date" name="date" id="date">
                    </div>
                    <div class="bf-col-6">
                        <p>Abreisedatum</p>
                        <input type="date" name="date" id="date">
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
<!-- align content in the middle of the page -->

<?php
include 'components/footer.php';
?>



