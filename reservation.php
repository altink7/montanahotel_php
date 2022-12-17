<?php
$page = basename($_SERVER['PHP_SELF'], '.php');
include 'components/head.php';
include 'components/nav.php';
require_once('dbaccess.php');

$fromdate = $todate = $zimmer ="";
$preis= 0;
$conn = new mysqli($host, $user, $password_db, $database);
$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['from-date'])) {
        $errors['fromdate'] = "Bitte wähle ein Anreisedatum aus!";
    } else {
        $fromdate = $_POST['from-date'];
    }
    if (empty($_POST['to-date'])) {
        $errors['todate'] = "Bitte wähle ein Abreisedatum aus!";
    } else {
        $todate = $_POST['to-date'];
    }
    if (empty($_POST['room-select'])) {
        $errors['room-select'] = "Bitte wähle ein Zimmer aus!";
    } else {
        $zimmer = $_POST['room-select'];
    }
        $breakfast = empty($_POST['breakfast'])? 0 : 1;
        $parking = empty($_POST['parking'])? 0 : 1;
        $pets = empty($_POST['pets'])? 0 : 1;

    if (empty($errors)) {
        $date1 = new DateTime($fromdate);
        $date2= new DateTime($todate);
        $interval = date_diff($date1, $date2);
        if($interval->format('%R%a')<0){
            $errors['dateError'] = "Das Abreisedatum muss nach dem Anreisedatum liegen!";
        
            }
        }
            if(empty($errors)){	
                if($zimmer == "Mountain Sweet"){
                    $preis = 100;
                }else if($zimmer == "Mountain View"){
                    $preis = 120;
                } else if ($zimmer == "Mountain Deluxe") {
                    $preis = 300;
                } else if ($zimmer == "Mountain Suite") {
                    $preis = 200;
                }
                ($breakfast == 1) ? $preis += 15 : $preis;
                ($parking == 1) ? $preis += 10 : $preis;

                $preis *= $interval -> format('%R%a');

        $result = mysqli_query($conn, "SELECT id FROM users WHERE username = '" . $_SESSION["username"] . "'");
        $row = mysqli_fetch_assoc($result);
        $id=$row['id'];
    
        $sql = "INSERT INTO `rooms`( `anreisedatum`, `abreisedatum`, `zimmer`, `fruehstueck`, `parkplatz`, `haustier`, `user_fk`,`preis`)
         VALUES ('$fromdate', '$todate', '$zimmer', '$breakfast', '$parking', '$pets',$id,$preis)";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "<bc> Error: " . $sql . "<br>" . $conn->error;
        }
        header("Location: profil.php");
    }

}


?>

<div class="Form">
    <div class="bf-container text-center">
        <div class="bf-body">
            <div class="bf-head">
                <h2>Buche jetzt deinen Aufenthalt bei Montana!</h2><br>
            </div>
            <form class="bf-body-box" action="reservation.php" method="post">
                <div class="bf-row">
                    <div class="bf-col-lg-6">
                        <h5>Anreisedatum
                            <input type="date" name="from-date" id="from-date">
                        </h5>
                    </div>
                    <div class="bf-col-lg-6">
                        <h5>Abreisedatum
                            <input type="date" name="to-date" id="to-date">
                        </h5>
                    </div> <br>
                    <div class="bf-col-lg-6 h5">
                        <select name="room-select">
                            <option class="rselect" value="keine Auswahl">Zimmer auswählen</option>
                            <option value="Mountain Sweet">Mountain Sweet</option>
                            <option value="Ozean Sweet">Ozean Sweet</option>
                            <option value="Deluxe Villa">Deluxe Villa</option>
                            <option value="Ozean Villa">Ozean Villa</option>
                        </select>
                    </div> <br>
                    <input type="checkbox" id="breakfeast" name="breakfast">
                    <label for="breakfeast">
                        <h5> inklusive Frühstück (€ 15 / Tag) </h5>
                    </label><br>

                    <input type="checkbox" id="parking" name="parking">
                    <label for="breakfeast">
                        <h5> inklusive Parkplatz (€ 10 / Tag)</h5>
                    </label><br>

                    <input type="checkbox" id="pets" name="pets">
                    <label for="pets">
                        <h5>Haustiere?</h5>
                    </label><br><br>
                </div>
                <div class="bf-row">
                    <div class="bf-col-lg-12">
                        <h5>Anmerkungen</h5>
                        <textarea name="messages" id="messages" cols="40" rows="5"></textarea>
                    </div>
                </div>
                <div class="bf-row">
                    <div class="bf-col-lg-3">
                        <input type="submit" value="Buchen">
                    </div>
                </div>
            </form>

            <?php
            if (!empty($errors)) {
                echo '<div class="alert alert-danger">';
                foreach ($errors as $error) {
                    echo $error . '<br>';
                }
                echo '</div>';
            }
            ?>

        </div>
    </div>
</div>
<?php
include 'components/footer.php';
?>