<?php
$page = basename($_SERVER['PHP_SELF'], '.php');
include 'components/head.php';
include 'components/nav.php';
require_once('dbaccess.php');


$fehler1 = $fehler2 = "";
if (!(empty($_GET["username"]) && empty($_GET["password"]))) {
    $sql = "SELECT password FROM users WHERE username = '" . $_SESSION["username"] . "'";
    $result = mysqli_query(new mysqli($host, $user, $password_db, $database), $sql);
    $row = mysqli_fetch_assoc($result);
// Change password
    if(password_verify( $_GET["password"],$row["password"])){
        if ($_GET["newPassword"] == $_GET["newPasswordConfirmed"]) {
            $sql = "UPDATE `users` SET `username` ='".$_GET['username']."',
            `password` = '".password_hash($_GET["newPassword"],PASSWORD_DEFAULT)."'
            WHERE `username` = '" . $_SESSION["username"] . "'";
            $_SESSION['username'] = $_GET['username'];
            $result = mysqli_query(new mysqli($host, $user, $password_db, $database), $sql);
        } else {
            $fehler1 = "die neuen Passwörter stimmen nicht überein";
        }
    } else {
        $fehler2 = "das alte Passwort ist nicht korrekt";
    }
}

$changeValue = empty($_GET["change"]) ? false : $_GET["change"];



?>
<!--User information-->
<div class="Form">
    <div class="reservierungen">
        <div class="contact text-center">
            <h2>
                <?php echo '<span style="color: white; font-size: 50px;">Welcome ' . $_SESSION['username'] .  '!'. '</span>';
                ?>
 <hr style="margin: 5%;">
                <h1>Daten ändern</h1>
            </h2>
            <table class="table-responsive">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Password</th>
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
                        <td><a class="btn btn-light" href="?change=true">Daten ändern</a> </td>
                    </tr>
                <!--Change user information-->
                    <?php if ($changeValue): ?>
                    <tr>
                        <form method="put" action="profil.php">
                            <th>New</th>
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
                            <td> <button class="btn btn-light" type="submit">Bestätigen</button> </td>
                        </form>
                    </tr>

                    <?php endif ?>
                </tbody>
            </table>

            <div class="errors" style="color:red;">
                <?php echo $fehler1 . "<br>" . $fehler2; ?>
            </div>
            <hr style="margin: 5%;">

            <!--Reservations-->
            <table class="table-responsive">
                <thead class="thead-light">
                    <h1>Reservierungen</h1>
                    <tr>
                        <th>#</th>
                        <th>Anreisedatum</th>
                        <th>Abreisedatum</th>
                        <th>Zimmer</th>
                        <th>Preis</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $conn = new mysqli($host, $user, $password_db, $database);
                    $result = mysqli_query($conn, "SELECT id, admin FROM users WHERE username = '" . $_SESSION["username"] . "'");
                    $rowhead = mysqli_fetch_assoc($result);
                    $id=$rowhead['id'];
                    $admin=$rowhead['admin'];

                    $sql = "SELECT * FROM rooms WHERE user_fk = $id";
                    $result = mysqli_query(new mysqli($host, $user, $password_db, $database), $sql);
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $i . "</td>";
                        echo "<td>" . $row["anreisedatum"] . "</td>";
                        echo "<td>" . $row["abreisedatum"] . "</td>";
                        echo "<td>" . $row["zimmer"] . "</td>";
                        echo "</tr>";

                        echo "<th></th>";
                        echo "<td> Frühtück:" . ($row["fruehstueck"]==0?' Nein':' Ja') . "</td>";
                        echo "<td> Parking:" . ($row["parkplatz"]==0?' Nein':' Ja') . "</td>";
                        echo "<td> Tiere:" . ($row["haustier"]==0?' Nein':' Ja') . "</td>";
                        echo "<td>" . $row['preis']." €</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td colspan='5'><hr></td>";
                        echo "</tr>";
                        $i++;

                    }

                     ?>
                </tbody>
            </table>
            <!--Upload news (admin only)-->
            <?php if ($admin==1) : ?>
                <hr style="margin: 5%;">
            <h1 class="kontaktieren">Beiträge verfassen</h1>
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
                <button class="btn btn-light" style="margin-top: 3%;" type="submit">Veröffentlichen</button>
            <?php endif ?>
        </div>
    </div>
</div>
</div>

</div>

<?php
include 'components/footer.php';


?>