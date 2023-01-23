<?php
$page = basename($_SERVER['PHP_SELF'], '.php');
include 'components/head.php';
include 'components/nav.php';
?>
<?php if (!isset($admin)):
include 'components/banner.php';
endif; ?>
 <?php if (isset($admin) && $admin == 1): ?>
<div class="Form">
    <!-- Benutzertabelle -START -->
    <div class="reservierungen">
        <div class="contact text-center">
            <h1>Benutzer</h1>
            <table class="table-responsive">
                <thead class="thead-light">
                    <tr>
                        <th>Id</th>
                        <th>Username</th>
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
                        echo "<td scope='row'>" . $id . "</td>";
                        echo "<td >" . $row["username"] . "</td>";
                        echo "<td>" . str_repeat("&bull;", 8) . "</td>";
                        echo "<td>" . ($row["status"] ? "aktiv" : "inaktiv") . "</td>";
                        echo "<td><a class='btn btn-light' href='useritems.php?userid=" . $id . "'>Daten ändern</a> </td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td colspan='5'><hr></td>";
                        echo "</tr>";
                     
                    }
                    $stmt->close();
                    $conn->close();
                ?>
                </tbody>
            </table>
    <!-- Benutzertabelle -END -->
            <hr style="margin: 5%;">
    <!-- Reservierungen -START -->
            <table class="table-responsive">
                <thead class="thead-light">
                    <h1>Reservierungen</h1>
                    <tr>
                        <th>#</th>
                        <th>Zimmer</th>
                        <th>Gast</th>
                        <th>Gebucht</th>
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
                        echo "<td scope='row'>" . $i . "</td>";
                        echo "<td>" . $row["zimmer"] . "</td>";
                        echo "<td>" . $user_room["username"] . "</td>";
                        echo "<td style=\"font-size:12px;\">" . $row['zeit'] . "</td>";
                        echo "<td><a class='btn btn-light' href='roomitems.php?roomid=" . $id . "'>Anzeigen</a> </td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td colspan='5'><hr></td>";
                        echo "</tr>";
                        $i++;
                    }
                    $stmt->close();
                    $stmt_users->close();
                    $conn->close();
                    ?>

                </tbody>
            </table>
    <!-- Reservierungen -END -->
        </div>
    </div>
</div>
<?php endif; ?>
<?php
include 'components/footer.php';
?>
