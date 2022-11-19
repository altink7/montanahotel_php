<?php
$page = basename($_SERVER['PHP_SELF'], '.php');
include 'components/head.php';
include 'components/nav.php';
include 'components/banner.php';
?>
    
    <section>
        <div class="faq">
            <table style="margin-top:100px; margin-left: 10px; margin-bottom: 50px">
                <tr>
                    <td>Wie kann man ein Zimmer buchen?</td>
                    <td>Ganz einfach bei dieser Website!</td>
                </tr>
                <tr>
                    <td>Kann man ein Zimmer stornieren?</td>
                    <td>Da gelten unsere Stornierbedienungen</td>
                </tr>
                <tr>
                    <td>Kann man Zinmmer über Trivago buchen?</td>
                    <td>Derzeit nicht.</td>
                </tr>
                <tr>
                    <td>Ab wann kann ich einchecken?</td>
                    <td>Der Check-In ist ab 11:00 möglich.</td>
                </tr>
                <tr>
                    <td>Gibt es ein Frühstücksbuffet?</td>
                    <td>Ja, wir bieten ein Frühstücksbuffet an.</td>
                </tr>
            </table>
        </div><br><br><br>
    </section>
    <?php
    include 'components/footer.php';
    ?>

    