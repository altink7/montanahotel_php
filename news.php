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

    <div class="Company-content">
        <img <?php echo 'src="upload/' . $_FILES['picture']['name'] . '"'; ?> alt="IMAGE" width="100px" height="80px">
        <h2><?php echo $title; ?></h2>

        <p><?php echo $text; ?>
        </p>

</div>

    <style>
        .Company-content {
        padding: 20px;
        margin: 20px;
        backface-visibility: visible;
        background-color: #5890b3;
        }
   
        .Company-content img{
        float: left;
        padding: 1px;
        }
    
        .Company-content a {
        text-decoration: none;
        color: darkblue;
        font-weight: bold;
        font-style: italic;
        }

        .Company-content a:hover {
        text-decoration: none;
        color: black;
        font-weight: bold;
        font-style: normal;
        }
</style>


    <?php
    include 'components/footer.php';
    ?>