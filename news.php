<?php
$page = basename($_SERVER['PHP_SELF'], '.php');
include 'components/head.php';
include 'components/nav.php';
include 'components/banner.php';

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

    <div class="Company-content">
        <img <?php echo 'src="upload/' . $picture . '"'; ?> alt="IMAGE" width="100px" height="80px">
        <h2><?php echo $title; ?></h2>

        <p><?php echo $text; ?>
        </p>

</div><br><br><br>

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