<?php
$page = basename($_SERVER['PHP_SELF'], '.php');
include 'components/head.php';
include 'components/nav.php';



$fromdate = $todate = $zimmer = $breakfast = $parking = $pets = "";

$fehler1 = $fehler2 = "";
if (!(empty($_GET["username"]) && empty($_GET["password"]))) {
    if ($_SESSION["password"] == $_GET["password"]) {
        if ($_GET["newPassword"] == $_GET["newPasswordConfirmed"]) {
            $sql = "UPDATE users SET password = '" . $_GET["newPassword"] . "' WHERE username = '" . $_SESSION["username"] . "'";
            $result = mysqli_query(new mysqli($host, $user, $password_db, $database), $sql);
            $_SESSION["password"] = $_GET["newPassword"];
        } else {
            $fehler1 = "die neuen Passwörter stimmen nicht überein";
        }
    } else {
        $fehler2 = "das alte Passwort ist nicht korrekt";
    }
}

$changeValue = empty($_GET["change"]) ? false : $_GET["change"];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        empty($_SESSION["fromdate"]) || end($_SESSION["fromdate"]) != $_POST['from-date'] ||
        end($_SESSION["todate"]) != $_POST['to-date']
    ) {

        if (empty($_SESSION["fromdate"])) {
            $_SESSION["fromdate"] = array();
            $_SESSION["fromdate"][] = $_POST['from-date'];
        } else {
            $_SESSION["fromdate"][] = $_POST['from-date'];
        }

        if (empty($_SESSION["todate"])) {
            $_SESSION["todate"] = array();
            $_SESSION["todate"][] = $_POST['to-date'];
        } else {
            $_SESSION["todate"][] = $_POST['to-date'];
        }

        if (empty($_SESSION["zimmer"])) {
            $_SESSION["zimmer"] = array();
            $_SESSION["zimmer"][] = $_POST['room-select'];
        } else {
            $_SESSION["zimmer"][] = $_POST['room-select'];
        }

        if (empty($_SESSION["breakfast"]) && isset($_POST['breakfast'])) {
            $_SESSION["breakfast"] = array();
            $_SESSION["breakfast"][] = 'Ja';
        } else if (isset($_POST['breakfast'])) {
            $_SESSION["breakfast"][] = 'Ja';
        } else {
            $_SESSION["breakfast"][] = 'Nein';
        }

        if (empty($_SESSION["parking"]) && isset($_POST['parking'])) {
            $_SESSION["parking"] = array();
            $_SESSION["parking"][] = 'Ja';
        } else if (isset($_POST['parking'])) {
            $_SESSION["parking"][] = 'Ja';
        } else {
            $_SESSION["parking"][] = 'Nein';
        }

        if (empty($_SESSION["pets"]) && isset($_POST['pets'])) {
            $_SESSION["pets"] = array();
            $_SESSION["pets"][] = 'Ja';
        } else if (isset($_POST['pets'])) {
            $_SESSION["pets"][] = 'Ja';
        } else {
            $_SESSION["pets"][] = 'Nein';
        }
    }
}


?>

<div class="Form">
    <div class="reservierungen">
        <div class="contact text-center">
            <h2>
                Hello
                <span class="badge bg-secondary">
                    <?php echo $_SESSION["username"] . " :) !"; ?>
                </span>
                <hr style="border:20px solid;">
                <h1>Daten ändern</h1>
            </h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Password</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope=row>1</th>
                        <td>
                            <?php echo $_SESSION["username"] ?>
                        </td>
                        <td>
                            <?php echo str_repeat("&bull;", strlen("password")) ?>
                        </td>
                        <td><a class="btn btn-primary" href="?change=true">Daten ändern</a> </td>
                    </tr>

                    <?php if ($changeValue): ?>
                    <tr>
                        <form method="put" action="login.php">
                            <th scope=row>New</th>
                            <td>
                                <input type="text" name="username" id="usernameInput">
                            </td>
                            <td>
                                <input type="password" name="password" id="password" minlength="8"
                                    placeholder="altes Passwort"> <br>
                                <input type="password" name="newPassword" id="newPassword" minlength="8"
                                    placeholder="neues Passwort"> <br>
                                <input type="password" name="newPasswordConfirmed" id="newPasswordConfirmed"
                                    minlength="8" placeholder="Passwort bestätigen">
                                <br>
                            </td>
                            <td> <button class="btn btn-primary" type="submit">Bestätigen</button> </td>
                        </form>
                    </tr>

                    <?php endif ?>
                </tbody>
            </table>

            <div class="errors" style="color:red;">
                <?php echo $fehler1 . "<br>" . $fehler2; ?>
            </div>
            <hr style="border:20px solid;">

            <table class="reservierung-table">
                <thead class="thead-light">
                    <h1>Reservierungen</h1>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Anreisedatum</th>
                        <th scope="col">Abreisedatum</th>
                        <th scope="col">Zimmer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //check if array is empty
                    if (!empty($_SESSION["fromdate"])) {
                        foreach ($_SESSION["fromdate"] as $key => $value) {
                            echo "<tr>";
                            echo "<th scope='row'>" . ($key + 1) . "</th>";
                            echo "<td>" . $value . "</td>";
                            echo "<td>" . $_SESSION["todate"][$key] . "</td>";
                            echo "<td>" . $_SESSION["zimmer"][$key] . "</td>";
                            echo "</tr>";
                            echo "<tr>";
                            //if this is the last element of the array then th is new
                            if ($key == count($_SESSION["fromdate"]) - 1) {
                                echo "<th scope='row'>Neu</th>";
                            } else {
                                echo "<th scope='row'>bestätigt</th>";
                            }
                            echo "<td> Frühtück:" . $_SESSION["breakfast"][$key] . "</td>";
                            echo "<td> Parking:" . $_SESSION["parking"][$key] . "</td>";
                            echo "<td> Tiere:" . $_SESSION["pets"][$key] . "</td>";
                            echo "</tr>";
                        }
                    } ?>
                </tbody>
            </table>
            <hr style="border:20px solid;">
            <h1 class="kontaktieren">Beiträge verfassen</h1>
            <hr>
            <form action="news.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="picture">Bild hochladen:</label><br>
                    <input type="file" name="picture" id="picture" accept="image/*"><br>
                </div><br>
                <div class="form-group">

                    <input type="text" name="title" id="title" placeholder="Titel"><br><br>
                </div>
                <div class="form-group">
                    <textarea type="text" name="text" id="text" placeholder="Ihr Beitrag" cols="40" rows="5"></textarea>
                </div>
                <button class="btn btn-primary" style="margin-top: 3%;" type="submit">Veröffentlichen</button>
        </div>
    </div>
</div>
</div>

</div>

<?php
include 'components/footer.php';
?>