<?php
$page = basename($_SERVER['PHP_SELF'], '.php');
include 'components/head.php';
include 'components/nav.php';
include 'components/banner.php';
?>


    <!--Section pool start-->
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
  
    <?php
    include 'components/footer.php';
    ?>