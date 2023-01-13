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
            <h1>Reservierung</h1>
            <table class='table-responsive'>
                <br>
                <?php $sql_users = "SELECT * FROM users WHERE id =" . $user_fk. ";";
            $result_users = mysqli_query($conn, $sql_users);
            $user_room = mysqli_fetch_assoc($result_users);
            //we used echo to increase the readability of the code, in able to see the output of the code

            //Table -Start
                echo "<tr>";
                echo "<td>" . 'ID' . "</td>";
                echo "<td>" . $id. "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td colspan='5'><hr></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" . 'Anreisedatum' . "</td>";
                echo "<td>" . $anreisedatum. "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td colspan='5'><hr></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" . 'Abreisedatum' . "</td>";
                echo "<td>" . $abreisedatum. "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td colspan='5'><hr></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" . 'Zimmer' . "</td>";
                echo "<td>" . $zimmer. "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td colspan='5'><hr></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" . 'Frühstück' . "</td>";
                echo "<td>". ($row["fruehstueck"]==0?' Nein':' Ja') . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td colspan='5'><hr></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" . 'Parkplatz' . "</td>";
                echo "<td>" . ($row["parkplatz"] == 0 ? 'Nein' : 'Ja') . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td colspan='5'><hr></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" . 'Haustier' . "</td>";
                echo "<td>" . ($row["haustier"] == 0 ? 'Nein' : 'Ja') . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td colspan='5'><hr></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" . 'User' . "</td>";
                echo "<td>" . $user_room["username"] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td colspan='5'><hr></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" . 'Zeit' . "</td>";
                echo "<td>" . $zeit. "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td colspan='5'><hr></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" . 'Preis' . "</td>";
                echo "<td>" . $preis. '€'. "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td colspan='5'><hr></td>";
                echo "</tr>";
            //Table -End
            ?>

               
            </table>


        </div>
    </div>
</div>


<?php
include 'components/footer.php';
?>