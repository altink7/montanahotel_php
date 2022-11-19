<?php
$page = basename($_SERVER['PHP_SELF'], '.php');
include 'components/head.php';
include 'components/nav.php';
include 'components/banner.php';



$fromdate = array();
$todate = array();
$zimmer = array();
$breakfast = array();
$parking = array();
$pets = array();


if(isset($_POST['from-date'])){
    $fromdate = $_POST['from-date'];
}
if(isset($_POST['to-date'])){
    $todate = $_POST['to-date'];
}
if(isset($_POST['room-select'])){
    $zimmer = $_POST['room-select'];
}

if(isset($_POST['breakfast'])){
    $breakfast = "Ja";
}
    else{
        $breakfast = "Nein";
    }
if(isset($_POST['parking'])){
    $parking = "Ja";
}
    else{
        $parking = "Nein";
    }
if(isset($_POST['pets'])){
    $pets = "Ja";
}
    else{
        $pets = "Nein";
    }


?>

<figcaption>
    <h2>Deine Buchung</h2>

    <p>Deine Buchungsdaten:</p>
    <p>Anreisedatum: <?php echo $fromdate; ?></p>
    <p>Abreisedatum: <?php echo $todate; ?></p>
    <p>Zimmer: <?php echo $zimmer; ?></p>
    <p>Frühstück: <?php echo $breakfast; ?></p>
    <p>Parkplatz: <?php echo $parking; ?></p>
    <p>Haustiere: <?php echo $pets; ?></p>
</figcaption>

<?php
    include 'components/footer.php';
?>