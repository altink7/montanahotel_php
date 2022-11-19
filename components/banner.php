<header>
    <!--Banner start-->
    <div class="Banner">

            <?php 
            if($page =='index'){
                echo('<p>Willkommen bei Montana!</p>');
            }elseif($page =='zimmer'){
                echo('<p>Zimmer</p>');
            }elseif($page =='about'){
                echo('<p>Über Uns</p>');
            }elseif($page =='impressum'){
                echo('<p>Impressum</p>');
            }elseif($page =='login'){
                echo('<p>Login<p>');
            }elseif($page =='register'){
                echo('<p>Registrieren</p>');
            }elseif($page =='restaurant'){
                echo('<p>Restaurant</p>');
            }elseif($page =='faq'){
                echo('<p>Frequently Asked Questions</p>');
            }elseif($page =='kontakt'){
                echo('<p>Kontakt</p>');
            }elseif($page =='datenschutz'){
                echo('<p>Datenschutzerklärung</p>');
            }elseif($page =='reservation'){
                    echo('<p>Zimmer Buchen</p>');
            }elseif($page =='news'){
                echo('<p>News</p>');
        }else{
                echo('<p>Willkommen bei Montana!</p>');
            }
            ?>
            
    </div>
    <!--Banner end-->
</header>