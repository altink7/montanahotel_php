<?php
$page = basename($_SERVER['PHP_SELF'], '.php');
include 'components/head.php';
include 'components/nav.php';



$fromdate = $todate = $zimmer = $breakfast = $parking = $pets = "";

//check if last element of array


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        empty($_SESSION["fromdate"]) || end($_SESSION["fromdate"]) != $_POST['from-date'] ||
        end($_SESSION["todate"]) != $_POST['to-date']
    ) {

        if (empty($_SESSION["fromdate"])) {
            $_SESSION["fromdate"] = array();
            $_SESSION["fromdate"][] = $_POST['from-date'];
        } else {
            $_SESSION["fromdate"][] = $_POST['from-date'];
        }

        if (empty($_SESSION["todate"])) {
            $_SESSION["todate"] = array();
            $_SESSION["todate"][] = $_POST['to-date'];
        } else {
            $_SESSION["todate"][] = $_POST['to-date'];
        }

        if (empty($_SESSION["zimmer"])) {
            $_SESSION["zimmer"] = array();
            $_SESSION["zimmer"][] = $_POST['room-select'];
        } else {
            $_SESSION["zimmer"][] = $_POST['room-select'];
        }

        if (empty($_SESSION["breakfast"]) && isset($_POST['breakfast'])) {
            $_SESSION["breakfast"] = array();
            $_SESSION["breakfast"][] = 'Ja';
        } else if (isset($_POST['breakfast'])) {
            $_SESSION["breakfast"][] = 'Ja';
        } else {
            $_SESSION["breakfast"][] = 'Nein';
        }

        if (empty($_SESSION["parking"]) && isset($_POST['parking'])) {
            $_SESSION["parking"] = array();
            $_SESSION["parking"][] = 'Ja';
        } else if (isset($_POST['parking'])) {
            $_SESSION["parking"][] = 'Ja';
        } else {
            $_SESSION["parking"][] = 'Nein';
        }

        if (empty($_SESSION["pets"]) && isset($_POST['pets'])) {
            $_SESSION["pets"] = array();
            $_SESSION["pets"][] = 'Ja';
        } else if (isset($_POST['pets'])) {
            $_SESSION["pets"][] = 'Ja';
        } else {
            $_SESSION["pets"][] = 'Nein';
        }
    }
}


?>

<div class="Form">
    <div class="reservierungen text-center">
        <table class="reservierung-table">
            <thead class="thead-light">
                <h2>Reservierungen</h2>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Anreisedatum</th>
                    <th scope="col">Abreisedatum</th>
                    <th scope="col">Zimmer</th>
                </tr>
            </thead>
            <tbody>
                <?php
        //check if array is empty
        if (!empty($_SESSION["fromdate"])) {
            foreach ($_SESSION["fromdate"] as $key => $value) {
                echo "<tr>";
                echo "<th scope='row'>" . ($key + 1) . "</th>";
                echo "<td>" . $value . "</td>";
                echo "<td>" . $_SESSION["todate"][$key] . "</td>";
                echo "<td>" . $_SESSION["zimmer"][$key] . "</td>";
                echo "</tr>";
                echo "<tr>";
                //if this is the last element of the array then th is new
                if ($key == count($_SESSION["fromdate"]) - 1) {
                    echo "<th scope='row'>Neu</th>";
                } else {
                    echo "<th scope='row'>bestätigt</th>";
                }
                echo "<td> Frühtück:" . $_SESSION["breakfast"][$key] . "</td>";
                echo "<td> Parking:" . $_SESSION["parking"][$key] . "</td>";
                echo "<td> Tiere:" . $_SESSION["pets"][$key] . "</td>";
                echo "</tr>";
            }
        } ?>
            </tbody>
        </table>

    </div>
    <div class="contact text-center">
        <h1 class="kontaktieren">Beiträge verfassen</h1>
        <hr>
        <form action="news.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="picture">Bild hochladen:</label><br>
                <input type="file" name="picture" id="picture" accept="image/*"><br>
            </div><br>
            <div class="form-group">

                <input type="text" name="title" id="title" placeholder="Titel"><br><br>
            </div>
            <div class="form-group">
                <textarea type="text" name="text" id="text" placeholder="Ihr Beitrag" cols="45" rows="5"></textarea>
            </div>
            <button type="submit">Veröffentlichen</button>
    </div>
</div>
</div>
</div>

</div>

<?php
include 'components/footer.php';
?>