<?php
$page = basename($_SERVER['PHP_SELF'], '.php');
include 'components/head.php';
include 'components/nav.php';

?>
   
    <section>
    <div class="Form">
    
    <div class="contact text-center">
        <h1 class="kontaktieren">Impressum</h1><br>
                <div class="col-lg-12">
                    <h5>Firmenname: Montana Resort GmbH</h5>
                </div>
                <div class="col-lg-12">
                    <h5>Firmensitz: Hochstädtplatz 6 | 1200 Wien</h5>
                </div>
                <div class="col-lg-12">
                    <h5>Telefon: +43 310 310 3</h5>
                </div>
                <div class="col-lg-12">
                    <h5>Fax: +43 310 310 3</h5>
                </div>
                <div class="col-lg-12">
                    <h5>E-Mail-Adresse: kundendienst@montana.at</h5>
                </div>
                <div class="col-lg-12">
                    <h5>Firmenbuch-Nr. FN 911991g</h5>
                </div>
                <div class="col-lg-12">
                    <h5>Firmenbuchgericht: Handelsgericht Wien</h5>
                </div>
                <div class="col-lg-12">
                    <h5>UID-Nr: ATU 911991</h5>
                </div>
                <div class="col-lg-12">
                    <br>
                    <h2>Eigentümer</h2>
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
                </div>
            </div>
        </div>
        
    <?php
    include 'components/footer.php';
    ?>