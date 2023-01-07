<?php
$page = basename($_SERVER['PHP_SELF'], '.php');
include 'components/head.php';
include 'components/nav.php';
?>

<div class="Form">
    <div class="reservierungen">
        <div class="contact text-center">
            <h2>Benutzer</h2>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Password</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $conn = new mysqli($host, $user, $password_db, $database);
                    $stmt = $conn->prepare("SELECT * FROM users");
                    $stmt->execute();
                    $result = $stmt->get_result();

                    while ($row = $result->fetch_assoc()) {
                        $id = $row["id"];
                        echo "<tr>";
                        echo "<td>" . $id . "</td>";
                        echo "<td>" . $row["username"] . "</td>";
                        echo "<td>" . str_repeat("&bull;", 8) . "</td>";
                        echo "<td>" . ($row["status"] ? "aktiv" : "inaktiv") . "</td>";
                        echo "<td><a class='btn btn-light' href='useritems.php?userid=" . $id . "'>Daten ändern</a> </td>";
                        echo "</tr>";
                    }
                    $stmt->close();
                    $conn->close();
                ?>

                </tbody>
            </table>
            <hr style="margin: 5%;">
            <table class="reservierung-table">
                <thead class="thead-light">
                    <h1>Reservierungen</h1>
                    <tr>
                        <th>#</th>
                        <th>Zimmer</th>
                        <th>Gast</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $conn = new mysqli($host, $user, $password_db, $database);
                    $stmt = $conn->prepare("SELECT * FROM rooms");
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $i = 1;

                    while ($row = $result->fetch_assoc()) {
                        $stmt_users = $conn->prepare("SELECT * FROM users WHERE id = ?");
                        $stmt_users->bind_param("i", $row['user_fk']);
                        $stmt_users->execute();
                        $result_users = $stmt_users->get_result();
                        $user_room = $result_users->fetch_assoc();
                        $id = $row["rooms_id"];
                        echo "<tr>";
                        echo "<th>" . $i . "</th>";
                        echo "<td>" . $row["zimmer"] . "</td>";
                        echo "<td>" . $user_room["username"] . "</td>";
                        echo "</tr>";
                        echo "<td style=\"font-size:10px;\">" . $row['zeit'] . "</td>";
                        echo "<td> </td>";
                        echo "<td> </td>";
                        echo "<td><a class='btn btn-light' href='roomitems.php?roomid=" . $id . "'>Anzeigen</a> </td>";
                        echo "</tr>";
                        $i++;
                    }
                    $stmt->close();
                    $stmt_users->close();
                    $conn->close();
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
include 'components/footer.php';
?>