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
                    $conn = new mysqli($host, $user, $password_db, $database);
                    $stmt = $conn->prepare("SELECT * FROM users");
                    $stmt->execute();
                    $result = $stmt->get_result();

                    while ($row = $result->fetch_assoc()) {
                        $id = $row["id"];
                        echo "<tr>";
                        echo "<th scope=row>" . $id . "</th>";
                        echo "<td>" . $row["username"] . "</td>";
                        echo "<td>" . str_repeat("&bull;", 8) . "</td>";
                        echo "<td>" . ($row["status"] ? "aktiv" : "inaktiv") . "</td>";
                        echo "<td><a class='btn btn-primary' href='useritems.php?userid=" . $id . "'>Daten ändern</a> </td>";
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
                        <th scope="col">#</th>
                        <th scope="col">Zimmer</th>
                        <th scope="col">Benutzer</th>
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