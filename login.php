<?php
require_once('dbaccess.php');
$page = basename($_SERVER['PHP_SELF'], '.php');
include 'components/head.php';
include 'components/nav.php';
include 'components/banner.php';

$logoutValue = empty($_GET["logout"]) ? false : $_GET["logout"];

if ($logoutValue) {
    session_destroy();
    header('Location: login.php');
}

// Checks if all fields are filled out
$errors = array();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["username"])) {
        $username = $_POST["username"];
    } else {
        $errors['usernameError'] = "Username darf nicht leer sein!";
    }
    if (!empty($_POST["password"])) {
        $password = $_POST["password"];
    } else {
        $errors['passwordError'] = "Password darf nicht leer sein!";
    }

//SQL injection safe login
    if (empty($errors)) {
        $conn = new mysqli($host, $user, $password_db, $database);
        $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE username = ?");
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);
    
        if ($user && password_verify($password, $user['password'])) {
            if ($user['status'] == 1) {
                $_SESSION["username"] = $user["username"];
                $_SESSION["loggedin"] = true;
                header('Location: index.php');
            } else {
                $errors['loginError'] = "User ist inaktiv!";
            }
        } else {
            $errors['loginError'] = "Username oder Passwort ist falsch!";
        }
    }
}

?>
<br><br><br>
<section>
    <div class="anmeldefenster">

        <?php if (!isset($_SESSION["loggedin"])): ?>

        <!-- Login Data Eingabe - POST  Start-->
        <form method="post" action="login.php">
            <label for="username">Username:</label> <br>
            <input type="text" name="username" id="usernameInput">
            <br>
            <label for="password">Passwort:</label><br>
            <input type="password" name="password" id="password" minlength="8">
            <br>

            <!--Errors START-->
            <div class="errors" style="color:red;">
                <?php foreach ($errors as $value) {
                echo $value . "<br>";
            } ?>
            </div>
            <!--Errors END-->

            <input id="submitButton" type="submit" value="Anmelden">

            <p>Noch nicht registriert?</p>
            <a id="submitButton" class="register" href="register.php"><input type="button" value="Registrieren"></a>
        </form>
        <!-- Login Data Eingabe - POST  End-->
        <?php endif ?>
    </div><br><br><br>
</section>

<?php
    include 'components/footer.php';
    ?>