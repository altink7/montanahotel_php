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
    $fromdate[] = $_POST['from-date'];
    $_SESSION['fromdate'] = $fromdate;
}
if(isset($_POST['to-date'])){
    $todate[] = $_POST['to-date'];
    $_SESSION['todate'] = $todate;
}

if(isset($_POST['room-select'])){
    $zimmer[] = $_POST['room-select'];
    $_SESSION['room-select'] = $zimmer;
}

if(isset($_POST['breakfast'])){
    $breakfast[] = "Ja";
    $_SESSION['breakfast'] = $breakfast;
}
    else{
        $breakfast[] = "Nein";
        $_SESSION['breakfast'] = $breakfast;
    }
if(isset($_POST['parking'])){
    $parking[] = "Ja";
    $_SESSION['parking'] = $parking;
}
    else{
        $parking[] = "Nein";
        $_SESSION['parking'] = $parking;
    }
if(isset($_POST['pets'])){
    $pets[] = "Ja";
    $_SESSION['pets'] = $pets;
}
    else{
        $pets[] = "Nein";
        $_SESSION['pets'] = $pets;
    }

?>

<div class="content text-center" >

<figcaption>
    <h2>Deine Buchung</h2>
    <?php foreach($fromdate as $fromdate): ?>
        <p>Anreisedatum: <?php echo $fromdate; ?></p>
    <?php endforeach; ?>
    <?php foreach($todate as $todate): ?>
        <p>Abreisedatum: <?php echo $todate; ?></p>
    <?php endforeach; ?>
    <?php foreach($zimmer as $zimmer): ?>
        <p>Zimmer: <?php echo $zimmer; ?></p>
    <?php endforeach; ?>
    <?php foreach($breakfast as $breakfast): ?>
        <p>Frühstück: <?php echo $breakfast; ?></p>
    <?php endforeach; ?>
    <?php foreach($parking as $parking): ?>
        <p>Parkplatz: <?php echo $parking; ?></p>
    <?php endforeach; ?>
    <?php foreach($pets as $pets): ?>
        <p>Haustiere: <?php echo $pets; ?></p>
    <?php endforeach; ?>
</figcaption>

<form action="news.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="picture">Select image to upload:</label>
    <input type="file" name="picture" id="picture" accept="image/*"><br><br>
  </div>
  <div class="form-group">
    <label for="title">Select title: </label>
    <input type="text" name="title" id="title"><br><br> 
  </div>
  <div class="form-group">
  <label for="title">Select text: </label>
  <input type="text" name="text" id="text"> <br> <br>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>

<?php
    include 'components/footer.php';
?>