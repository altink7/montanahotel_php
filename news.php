<?php
$page = basename($_SERVER['PHP_SELF'], '.php');
include 'components/head.php';
include 'components/nav.php';

$picture = $title = $text = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //check if the uploaded file is an image
    if (isset($_FILES['picture']) && $_FILES['picture']['error'] == 0) {
        $info = getimagesize($_FILES['picture']['tmp_name']);
        if ($info === FALSE) {
            echo "Error: Not an image";
        } else {
            $picture = $_FILES['picture']['name'];
            $target = 'images/' . $picture;
            move_uploaded_file($_FILES['picture']['tmp_name'], 'upload/' . $_FILES['picture']['name']);
        }
    }
    $picture = $_FILES['picture']['name'];
    $title = $_POST['title'];
    $text = $_POST['text'];  
}

?>
<div class="Form">
    <div class="contact text-center">
        <h1 class="kontaktieren">Beiträge</h1><hr style="width:60%;margin-left:20%;">
        <img src="img/food.png" width="150" height="150">
                <div class="col-lg-12">
                <h2>Ich bin begeistert</h2>
                </div>
                <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                <p>Eines der schönsten Hotels in denen ich jemals war. Sehr nettes Personal, vor allem die Geschäftsführer. Auch das Essen war eine 10 von 10</p>
                </div>
                <div class="col-lg-3"></div><br>
                </div><hr style="width:60%;margin-left:20%;">
                <div class="col-lg-12">
                <img <?php echo 'src="upload/' . $picture . '"'; ?> alt=" " width="150" height="150">
                </div><br>
                <div class="col-lg-12">
                <h2><?php echo $title; ?></h2>
                </div>
                <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                <p><?php echo $text; ?></p>
                </div>
                <div class="col-lg-3"></div><br>
            </div>
        </div>
       
    </div>



    <?php
    include 'components/footer.php';
    ?>