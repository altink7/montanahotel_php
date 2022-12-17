<?php
$page = basename($_SERVER['PHP_SELF'], '.php');
include 'components/head.php';
include 'components/nav.php';
?>

<div class="Form">
    <div class="reservierungen">
        <div class="contact text-center">
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
                    while ($row = mysqli_fetch_assoc($result
                    )) {
                        $id = $row["id"];
                        echo "<tr>";
                        echo "<th scope=row>" . $id . "</th>";
                        echo "<td>" . $row["username"] . "</td>";
                        echo "<td>" . str_repeat("&bull;", strlen($row["password"])) . "</td>";
                        echo "<td>" . ($row["status"]?"aktiv":"inaktiv") . "</td>";
                        echo "<td><a class='btn btn-primary' href='useritems.php?userid=".$id."'>Daten ändern</a> </td>";
                        echo "</tr>";
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