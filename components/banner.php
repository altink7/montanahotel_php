<header>
    <!--Banner start-->
    <div class="Banner">
            <?php 
             echo($page =='index'?'<p>Willkommen bei Montana!</p>':'')
             ?><?php 
             echo($page =='zimmer'?'<p>Zimmer</p>':'')
             ?><?php 
             echo($page =='about'?'<p>Über Uns</p>':'')
             ?><?php 
             echo($page =='impressum'?'<p>Impressum</p>':'')
             ?><?php 
             echo($page =='login'?'<p>Login<p>':'')
             ?><?php 
             echo($page =='register'?'<p>Registrieren</p>':'')
             ?><?php 
             echo($page =='restaurant'?'<p>Restaurant</p>':'')
             ?><?php 
             echo($page =='faq'?'<p>Frequently Asked Questions</p>':'')
            ?><?php 
            echo($page =='kontakt'?'<p>Kontakt</p>':'')
            ?><?php 
            echo($page =='datenschutz'?'<p>Datenschutzerklärung</p>':'')
            ?>
    </div>
    <!--Banner end-->
</header>
