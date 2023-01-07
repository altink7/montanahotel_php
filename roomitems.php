<?php
$page = basename($_SERVER['PHP_SELF'], '.php');
include 'components/head.php';
include 'components/nav.php';

$roomsid = "";

if ((empty($_GET["roomid"]))) {
} else {
    $_SESSION["changeRoomid"] = $_GET["roomid"];
}

if (!(empty($_SESSION["changeRoomid"]))) {
    $roomsid = $_SESSION["changeRoomid"];
    $sql = "SELECT * FROM rooms WHERE rooms_id = $roomsid";
    $result = mysqli_query(new mysqli($host, $user, $password_db, $database), $sql);
    $row = mysqli_fetch_assoc($result);
    $id = $row["rooms_id"];
    $anreisedatum = $row["anreisedatum"];
    $abreisedatum = $row["abreisedatum"];
    $zimmer = $row["zimmer"];
    $fruehstuck = empty($row["fruehstuck"]) ? '0' : '1';
    $parkplatz = empty($row["parkplatz"]) ? '0' : '1';
    $haustier = empty($row["haustier"]) ? '0' : '1';
    $user_fk = $row["user_fk"];
    $zeit = $row["zeit"];
    $preis = $row["preis"];
}

$fehler1 = "";
if (!(empty($_GET["username"]) && empty($_GET["newPassword"]))) {
    if ($_GET["newPassword"] == $_GET["newPasswordConfirmed"]) {
        $sql = "UPDATE `users`
             SET `username` ='" . $_GET['username'] . "',
            `password` = '" . password_hash($_GET["newPassword"], PASSWORD_DEFAULT) . "',
            `status` = '" . (empty($_GET['status']) ? '0' : '1') . "'
            WHERE `username` = '" . $username . "'";
        $username = $_GET['username'];
        $result = mysqli_query(new mysqli($host, $user, $password_db, $database), $sql);
    } else {
        $fehler1 = "die neuen Passwörter stimmen nicht überein";
    }

    header("Location: useritems.php");
}
?>

<div class='Form'>
    <div class='reservierungen'>
        <div class='contact text-center'>
            <h1>Reservierung bearbeiten</h1>
            <table class='table table-striped'>
                <?php $sql_users = "SELECT * FROM users WHERE id =" . $user_fk. ";";
            $result_users = mysqli_query($conn, $sql_users);
            $user_room = mysqli_fetch_assoc($result_users);
            ?>

                <tr>
                    <th>Id</th>
                    <td>
                        <?php echo $id; ?>
                    </td>
                </tr>
                <tr>
                    <th>Anreisedatum</th>
                    <td>
                        <?php echo $anreisedatum; ?>
                    </td>
                </tr>
                <tr>
                    <th>Abreisedatum</th>
                    <td>
                        <?php echo $abreisedatum; ?>
                    </td>
                </tr>
                <tr>
                    <th>Zimmer</th>
                    <td>
                        <?php echo $zimmer; ?>
                    </td>
                </tr>
                <tr>
                    <th>Frühstück</th>
                    <td>
                        <?php echo $row["fruehstueck"] == 0 ? 'Nein' : 'Ja'; ?>
                    </td>
                </tr>
                <tr>
                    <th>Parkplatz</th>
                    <td>
                        <?php echo $row["parkplatz"] == 0 ? 'Nein' : 'Ja'; ?>
                    </td>
                </tr>
                <tr>
                    <th>Haustier</th>
                    <td>
                        <?php echo $row["haustier"] == 0 ? 'Nein' : 'Ja' ?>
                    </td>
                </tr>
                <tr>
                    <th>User</th>
                    <td>
                        <?php echo $user_room["username"]; ?>
                    </td>
                </tr>
                <tr>
                    <th>Zeit</th>
                    <td>
                        <?php echo $zeit; ?>
                    </td>
                </tr>
                <tr>
                    <th>Preis</th>
                    <td>
                        <?php echo $preis . " €"; ?>
                    </td>
                </tr>

            </table>


        </div>
    </div>
</div>


<?php
include 'components/footer.php';
?>