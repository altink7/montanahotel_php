<?php
$page = basename($_SERVER['PHP_SELF'], '.php');
include 'components/head.php';
include 'components/nav.php';
?>

<div class="Form">
    <div class="reservierungen">
        <div class="contact text-center">
            <h2>Benutzer</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Password</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM users";
                    $result = mysqli_query(new mysqli($host, $user, $password_db, $database), $sql);
                    while (
                        $row = mysqli_fetch_assoc(
                            $result
                        )
                    ) {
                        $id = $row["id"];
                        echo "<tr>";
                        echo "<th scope=row>" . $id . "</th>";
                        echo "<td>" . $row["username"] . "</td>";
                        echo "<td>" . str_repeat("&bull;", 8) . "</td>";
                        echo "<td>" . ($row["status"] ? "aktiv" : "inaktiv") . "</td>";
                        echo "<td><a class='btn btn-primary' href='useritems.php?userid=" . $id . "'>Daten ändern</a> </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
<hr style="margin: 5%;">
            <table class="reservierung-table">
                <thead class="thead-light">
                    <h1>Reservierungen</h1>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Zimmer</th>
                        <th scope="col">Benutzer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $conn = new mysqli($host, $user, $password_db, $database);
                    $sql = "SELECT * FROM rooms;";
                    $result = mysqli_query($conn, $sql);
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $sql_users = "SELECT * FROM users WHERE id =".$row['user_fk'].";";
                        $result_users = mysqli_query($conn, $sql_users);
                        $user_room = mysqli_fetch_assoc($result_users);
                        $id = $row["rooms_id"];
                        echo "<tr>";
                        echo "<th scope=row>" . $i . "</th>";
                        echo "<td>" . $row["zimmer"] . "</td>";
                        echo "<td>" . $user_room["username"] . "</td>";
                        echo "</tr>";
                        echo "<td style=\"font-size:10px;\" scope='row'>" . $row['zeit'] . "</td>";
                        echo "<td> </td>";
                        echo "<td> </td>";
                        echo "<td><a class='btn btn-primary' href='roomitems.php?roomid=" . $id . "'>Daten ändern</a> </td>";
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