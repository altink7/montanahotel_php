<?php
$page = basename($_SERVER['PHP_SELF'], '.php');
include 'components/head.php';
include 'components/nav.php';

$userid = "";

if((empty($_GET["userid"]))){
} else{
    $_SESSION["changeUserid"] = $_GET["userid"];
}

if (!(empty($_SESSION["changeUserid"]))) {
    $userid = $_SESSION["changeUserid"];
    $sql = "SELECT * FROM users WHERE id = $userid";
    $result = mysqli_query(new mysqli($host, $user, $password_db, $database), $sql);
    $row = mysqli_fetch_assoc($result);
    $username = $row["username"];
    $password = $row["password"];
    $status = $row["status"];
    $id = $row["id"];
}

$fehler1 = "";
if (!(empty($_GET["username"]) && empty($_GET["newPassword"]))) {
        if ($_GET["newPassword"] == $_GET["newPasswordConfirmed"]) {
            $sql = "UPDATE `users`
             SET `username` ='".$_GET['username']."',
            `password` = '".password_hash($_GET["newPassword"],PASSWORD_DEFAULT)."',
            `status` = '".(empty($_GET['status'])?'0':'1')."'
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
            <table class='table table-striped'>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Password</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>
                            <?php echo $id ?> 
                        </th>
                        <td>
                            <?php echo $username ?> 
                        </td>
                        <td>
                            <?php echo str_repeat("&bull;", 8) ?> 
                        </td>
                        <td>
                            <?php echo ($status ? "aktiv" : "inaktiv") ?> 
                        </td>
                        <td>  </td>
                    </tr>
                    <tr>
                        <form method="put" action="useritems.php">
                            <th>New</th>
                            <td>
                                <input type="text" name="username" id="usernameInput">
                            </td>
                            <td>
                                <input type="password" name="newPassword" id="newPassword" minlength="8"
                                    placeholder="neues Passwort"> <br>
                                <input type="password" name="newPasswordConfirmed" id="newPasswordConfirmed"
                                    minlength="8" placeholder="Passwort bestätigen"> 
                            </td>
                            <td>
                                <input type="checkbox" name="status" id="status" value="1"> <br>
                            </td>
                                <br>
                            </td>
                            <td> <button class="btn btn-light" type="submit">Bestätigen</button> </td>
                        </form>
                    </tr>
                </tbody>
            </table>
        <?php
?>
<table class="reservierung-table">
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
                    $result = mysqli_query($conn, "SELECT id, admin FROM users WHERE username = '" . $username . "'");
                    $rowhead = mysqli_fetch_assoc($result);
                    $id=$rowhead['id'];
                    $admin=$rowhead['admin'];

                    $sql = "SELECT * FROM rooms WHERE user_fk = $id";
                    $result = mysqli_query(new mysqli($host, $user, $password_db, $database), $sql);
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<th>" . $i . "</th>";
                        echo "<td>" . $row["anreisedatum"] . "</td>";
                        echo "<td>" . $row["abreisedatum"] . "</td>";
                        echo "<td>" . $row["zimmer"] . "</td>";
                        echo "</tr>";

                        echo "<td style=\"font-size:10px;\" scope='row'>".$row['zeit']."</td>";
                        echo "<td> Frühtück:" . ($row["fruehstueck"]==0?'Nein':'Ja') . "</td>";
                        echo "<td> Parking:" . ($row["parkplatz"]==0?'Nein':'Ja') . "</td>";
                        echo "<td> Tiere:" . ($row["haustier"]==0?'Nein':'Ja') . "</td>";
                        echo "<td>" . $row['preis']." €</td>";

                        echo "</tr>";
                        $i++;

                    }

                     ?>
                </tbody>
            </table>
        </div>
    </div>
</div>





<?php
include 'components/footer.php';
?>