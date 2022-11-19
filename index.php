<?php
$page = basename($_SERVER['PHP_SELF'], '.php');
include 'components/head.php';
include 'components/nav.php';
include 'components/banner.php';
?>
<!--Section pool start-->
<br><br><br>
<div class = "row"></div>
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-3">
                <img class = poolimg src="img/pool.png">
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-4 contentroom btn-group-vertical">
            <a name="mountainsweet"></a>
            <h2 class="content-title">Atemberaubende Aussicht</h2>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>	
            </div>
        </div>
        <div class="col-lg-1"></div>
    </div>
    <!--Section pool end-->
    <br>
    <!--Section food start-->
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-4 contentroom btn-group-vertical">
            <a name="mountainsweet"></a>
            <h2 class="content-title">Haubenküche</h2>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>	
            </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-3">
            <img class = foodimg src="img/food.png">
    </div>
        <div class="col-lg-1"></div>
    </div>
    <!--Section food end-->
    <div class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3979.201109659353!2d73.45431622961873!3d4.18083128723836!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b40802cd894794b%3A0x17f4835bfa2b8af6!2sGulhi%20Falhu%2C%20Malediven!5e0!3m2!1sde!2sat!4v1665410683616!5m2!1sde!2sat"
            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div><br><br><br>
    <aside></aside>
    <?php
    include 'components/footer.php';
    ?>