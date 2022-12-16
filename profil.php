<?php
$page = basename($_SERVER['PHP_SELF'], '.php');
include 'components/head.php';
include 'components/nav.php';
require_once('dbaccess.php');


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
                    $conn = new mysqli($host, $user, $password_db, $database);
                    $result = mysqli_query($conn, "SELECT id FROM users WHERE username = '" . $_SESSION["username"] . "'");
                    $row = mysqli_fetch_assoc($result);
                    $id=$row['id'];

                    $sql = "SELECT * FROM rooms WHERE user_fk = $id";
                    $result = mysqli_query(new mysqli($host, $user, $password_db, $database), $sql);
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<th scope=row>" . $i . "</th>";
                        echo "<td>" . $row["anreisedatum"] . "</td>";
                        echo "<td>" . $row["abreisedatum"] . "</td>";
                        echo "<td>" . $row["zimmer"] . "</td>";
                        echo "</tr>";

                        echo "<th scope='row'>#</th>";
                        echo "<td> Frühtück:" . ($row["fruehstueck"]==0?'Nein':'Ja') . "</td>";
                        echo "<td> Parking:" . ($row["parkplatz"]==0?'Nein':'Ja') . "</td>";
                        echo "<td> Tiere:" . ($row["haustier"]==0?'Nein':'Ja') . "</td>";
                        echo "</tr>";
                        $i++;

                    }

                     ?>
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