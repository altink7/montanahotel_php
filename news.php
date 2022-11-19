<?php
$page = basename($_SERVER['PHP_SELF'], '.php');
include 'components/head.php';
include 'components/nav.php';
include 'components/banner.php';

$picture = $title = $text = "";

    //move the uploaded file to the uploads folder
    move_uploaded_file($_FILES['picture']['tmp_name'], 'upload/' . $_FILES['picture']['name']);

    //define post entrys
    $picture = $_FILES['picture']['name'];
    $title = $_POST['title'];
    $text = $_POST['text'];

?>

<div>
    <h2> <?php echo $title; ?> </h2>
    <p> <?php echo $text; ?></p>
    <?php echo '<img src="upload/' . $_FILES['picture']['name'] . '" />'; ?>
</div>

   
    <?php
    include 'components/footer.php';
    ?>