<?php
$page = basename($_SERVER['PHP_SELF'], '.php');
include 'components/head.php';
include 'components/nav.php';
include 'components/banner.php';
?>

    <!--About us-->
    <section>
        <div class="julian">
            <figcaption>
                <caption>Julian Hoffmann</caption>
                <img class="julianimg" src="img/julian.jpg" width="230" height="150">

            </figcaption>
        </div>
        <hr>
        <div class="altin">
            <figcaption>
                <caption>Altin Kelmendi</caption>
                <img class="altinimg" src="img/altin.png" width="230" height="150">
            </figcaption>
        </div>
        <br><br><br>
        
    </section>
    

    <?php
    include 'components/footer.php';
    ?>