<?php
$page = basename($_SERVER['PHP_SELF'], '.php');
include 'components/head.php';
include 'components/nav.php';
?>

<header>
    <!--Banner start-->
    <div class="Banner">
        <p>Restaurant</p>
    </div>
    <!--Banner end-->
</header>
    <!--Section 1 start-->
    <section>
        <div class="pool">
            <a> <img class="poolimg" src="img/pool.png"></a>
            <a> Luxus mitten in der Natur</a>
        </div>

        <div class="food">
            <a id="foodtxt"> Lassen Sie sich von unseren Sterneköchen verzaubern</a>
            <a id="foodimg"> <img class="foodimg" src="img/food.png"></a>
        </div>


    </section>
    <!--Section 1 end-->
   
    <?php
    include 'components/footer.php';
    ?>