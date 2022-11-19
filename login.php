<?php
$page = basename($_SERVER['PHP_SELF'], '.php');
include 'components/head.php';
include 'components/nav.php';
include 'components/banner.php';
                print_r($_GET);  //Hilfe bei der Implementierung -wird gelöscht
                print_r($_POST); //Hilfe bei der Implementierung -wird gelöscht
                
                $fehler1 = $fehler2= "";
                if(!(empty($_GET["username"])&&empty($_GET["password"]))){
                    if($_SESSION["password"] == $_GET["password"]){
                        if($_GET["newPassword"]==$_GET["newPasswordConfirmed"]){
                            $_SESSION["username"] = $_GET["username"];
                            $_SESSION["password"] = $_GET["newPassword"];
                        }else{
                        $fehler1 = "die neuen Passwörter stimmen nicht überein";
                        }
                    }else{
                        $fehler2 = "das alte Passwort ist nicht korrekt";
                    }
                }

$logoutValue = empty($_GET["logout"])?false:$_GET["logout"];
$changeValue = empty($_GET["change"])?false:$_GET["change"];

    if($logoutValue){
         session_destroy();
         header('Location: login.php'); 
    }

//Serverseitige Überprüfung von den eingegebenen Daten START 
$errors = array();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST["username"])) {
            $vorname = $_POST["username"];
        }else{
            $errors['usernameError']="Username darf nicht leer sein!";
        }if (!empty($_POST["password"])) {
            $password = $_POST["password"];
        }else{
            $errors['passwordError']="Password darf nicht leer sein!";
        }
//Serverseitige Überprüfung von den eingegebenen Daten END
    
   
    if ( $_POST["username"] === "montanauser" && $_POST["password"] === "12345678") {
        $_SESSION["username"] = $_POST["username"];
        $_SESSION["password"] = $_POST["password"];
        $_SESSION['loggedin'] = true;
    }
 
}

?>

    <section>
        <div class="anmeldefenster">

        <?php if (!isset($_SESSION["username"])): ?>

    <!-- Login Data Eingabe - POST  Start-->
            <form method="post" action="login.php">
                <label for="username">Username:</label> <br>
                <input type="text" name="username" id="usernameInput" >
                <br>
                <label for="password">Passwort:</label><br>
                <input type="password" name="password" id="password" minlength="8">
                <br>

        <!--Errors START-->
                <div class="errors" style= "color:red;">
                <?php foreach($errors as $value){ echo $value ."<br>"; } ?> 
                </div>
        <!--Errors END-->

                <input id="submitButton" type="submit" value="Anmelden">

               <p>Noch nicht registriert?</p>
            <a id="submitButton" class="register" href="register.php"><input type="button" value="Registrieren"></a> 
            </form>
    <!-- Login Data Eingabe - POST  End-->

            <?php else: ?>
                <h2>
                  Hello
                  <span class="badge bg-secondary"> <?php echo $_SESSION["username"]." :) !"; ?></span>
                </h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Password</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                            <th scope=row>1</th>
                            <td><?php echo $_SESSION["username"]?></td>
                            <td><?php echo str_repeat("&bull;", strlen($_SESSION["password"]))?> </td>
                            <td><a class="btn btn-primary" href="?change=true">Daten ändern</a> </td>
                            </tr>

                            <?php if ($changeValue): ?>
                            <tr>
                                <form  method="put" action="login.php">
                                        <th scope=row>New</th>
                                    <td>
                                        <input type="text" name="username" id="usernameInput" >
                                    </td>
                                    <td>
                                        <input type="password" name="password" id="password" minlength="8" placeholder="altes Passwort"> <br>
                                        <input type="password" name="newPassword" id="newPassword" minlength="8" placeholder="neues Passwort"> <br>
                                        <input type="password" name="newPasswordConfirmed" id="newPasswordConfirmed" minlength="8" placeholder="Passwort bestätigen">
                                        <br>
                                    </td>
                                    <td> <button type="submit">Submit</button> </td>
                                </form>
                                    </tr>

                            <?php endif ?>
                    </tbody>
                </table>

                <div class="errors" style= "color:red;">
                    <?php echo $fehler1."<br>".$fehler2;?> 
                </div> 

                <br>
                <a class="btn btn-primary"  style= "margin-top:30px;"href="?logout=true">Logout</a>
                
            <?php endif ?>
        </div>
    </section>
    
    <?php
    include 'components/footer.php';
    ?>