<?php
$page = basename($_SERVER['PHP_SELF'], '.php');
include 'components/head.php';
include 'components/nav.php';
include 'components/banner.php';
?>
   
    <section>
        <div class="impressum">

            <table style="margin-top:100px; margin-left: 20px; margin-bottom: 100px;">
                <tr>
                    <td>Firmenname:</td>
                    <td>Montana Resort GmbH</td>
                </tr>
            
                <tr>
                    <td>Firmensitz:</td>
                    <td>Hochstädtplatz 6 | 1200 Wien</td>
                </tr>
                <tr>
                    <td>Telefon:</td>
                    <td>+43 310 310 3</td>
                </tr>
                <tr>
                    <td>Fax:</td>
                    <td>+43 310 310 3</td>
                </tr>
                <tr>
                    <td>E-Mail-Adresse:</td>
                    <td>kundendienst@montana.at</td>
                </tr>
                <tr>
                    <td>Firmenbuch-Nr.</td>
                    <td>FN 911991g</td>
                </tr>
                <tr>
                    <td>Firmenbuchgericht:</td>
                    <td>Handelsgericht Wien</td>
                </tr>
                <tr>
                    <td>UID-Nr:</td>
                    <td>ATU 911991</td>
                </tr>
            </table>

        </div>

    </section>
    
    <?php
    include 'components/footer.php';
    ?>