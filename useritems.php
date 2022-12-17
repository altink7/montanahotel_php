<?php
$page = basename($_SERVER['PHP_SELF'], '.php');
include 'components/head.php';
include 'components/nav.php';

$userid = empty($_GET["userid"]) ? false : $_GET["userid"];

if ($userid) {
    $sql = "SELECT * FROM users WHERE id = $userid";
    $result = mysqli_query(new mysqli($host, $user, $password_db, $database), $sql);
    $row = mysqli_fetch_assoc($result);
    $username = $row["username"];
    $password = $row["password"];
    $status = $row["status"];
    $id = $row["id"];
}

?>

<div class='Form'>
    <div class='reservierungen'>
        <div class='contact text-center'>
            <table class='table table-striped'>
                <thead>
                    <tr>
                        <th scope='col'>Id</th>
                        <th scope='col'>Name</th>
                        <th scope='col'>Password</th>
                        <th scope='col'>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope=row>
                            <?php echo $id ?> 
                        </th>
                        <td>
                            <?php echo $username ?> 
                        </td>
                        <td>
                            <?php echo str_repeat("&bull;", strlen($password)) ?> 
                        </td>
                        <td>
                            <?php echo ($status ? "aktiv" : "inaktiv") ?> 
                        </td>
                    </tr>
                </tbody>
            </table>
        
        <?php
if ($userid) {
    ?>
        <form action="" method="post">
            <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="username">
            <label for="password">Password</label>
            <input type="text" class="form-control" id="password" name="password" value="password">
            <label for="status">Status</label>
            <input type="text" class="form-control" id="status" name="status" value="1">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    <?php
}
?>
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
                    $result = mysqli_query($conn, "SELECT id, admin FROM users WHERE username = '" . $username . "'");
                    $rowhead = mysqli_fetch_assoc($result);
                    $id=$rowhead['id'];
                    $admin=$rowhead['admin'];

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
        </div>
    </div>
</div>





<?php
include 'components/footer.php';
?>