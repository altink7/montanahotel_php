<?php
$page = basename($_SERVER['PHP_SELF'], '.php');
include 'components/head.php';
include 'components/nav.php';
include 'components/banner.php';


$fromdate = $todate = $zimmer = $breakfast = $parking = $pets = "";

//check if last element of array

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_SESSION["fromdate"]) || end($_SESSION["fromdate"]) != $_POST['from-date']) {
        if(empty($_SESSION["fromdate"])){
            $_SESSION["fromdate"] = array();
            $_SESSION["fromdate"][] = $_POST['from-date'];
        }else{
            $_SESSION["fromdate"][] = $_POST['from-date'];
        }

        if(empty($_SESSION["todate"])){
            $_SESSION["todate"] = array();
            $_SESSION["todate"][] = $_POST['to-date'];
        }else{
            $_SESSION["todate"][] = $_POST['to-date'];
        }

        if(empty($_SESSION["zimmer"])){
            $_SESSION["zimmer"] = array();
            $_SESSION["zimmer"][] = $_POST['room-select'];
        }else{
            $_SESSION["zimmer"][] = $_POST['room-select'];
        }

        if(empty($_SESSION["breakfast"])&&isset($_POST['breakfast'])){
            $_SESSION["breakfast"] = array();
            $_SESSION["breakfast"][] = 'Ja';
        }else if(isset($_POST['breakfast'])){
            $_SESSION["breakfast"][] = 'Ja';
        }else{
            $_SESSION["breakfast"][] = 'Nein';
        }

        if(empty($_SESSION["parking"])&&isset($_POST['parking'])){
            $_SESSION["parking"] = array();
            $_SESSION["parking"][] = 'Ja';
        }else if(isset($_POST['parking'])){
            $_SESSION["parking"][] = 'Ja';
        }else{
            $_SESSION["parking"][] = 'Nein';
        }

        if(empty($_SESSION["pets"])&& isset($_POST['pets'])){
            $_SESSION["pets"] = array();
            $_SESSION["pets"][] = 'Ja';
        }else if(isset($_POST['pets'])){
            $_SESSION["pets"][] = 'Ja';
        }else{
            $_SESSION["pets"][] = 'Nein';
        }
        
    }
}


?>

<div class="content text-center" >


<table class="table">
  <thead class="thead-light">
  <br><br><br>
    <h2>Reservierungen</h2>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Anreisedatum</th>
        <th scope="col">Abreisedatum</th>
        <th scope="col">Frühstück</th>
        <th scope="col">Parkplatz</th>
        <th scope="col">Haustiere</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php foreach($_SESSION["fromdate"] as $key => $value){
        echo "<tr>";
        echo "<th scope='row'>".($key+1)."</th>";
        echo "<td>".$value."</td>";
        echo "<td>".$_SESSION["todate"][$key]."</td>";
        echo "<td>".$_SESSION["breakfast"][$key]."</td>";
        echo "<td>".$_SESSION["parking"][$key]."</td>";
        echo "<td>".$_SESSION["pets"][$key]."</td>";
        echo "</tr>";
    } ?>
    
</table>
<h2>Beiträge erfassen</h2>
<form action="news.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="picture">Bild hochladen:</label>
    <input type="file" name="picture" id="picture" accept="image/*"><br><br>
  </div>
  <div class="form-group">
    <label for="title">Titel: </label>
    <input type="text" name="title" id="title"><br><br> 
  </div>
  <div class="form-group">
  <textarea type="text" name="text" id="text" placeholder="Ihr Beitrag"cols="45" rows="5"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
<br><br><br>
<?php
    include 'components/footer.php';
?>