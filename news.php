<?php
$page = basename($_SERVER['PHP_SELF'], '.php');
include 'components/head.php';
include 'components/nav.php';
require_once('dbaccess.php');

$picture = $title = $text = "";
$errors = array();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES['picture']) && $_FILES['picture']['error'] == 0) {
        $picture = $_FILES['picture']['name'];
        $target = 'images/' . $picture;
        move_uploaded_file($_FILES['picture']['tmp_name'], 'upload/' . $_FILES['picture']['name']);
        $picture = $_FILES['picture']['name'][''];
    } else {
        $errors['pictureError'] = "Bild darf nicht leer sein!";
    }
    if (!empty($_POST["title"])) {
        $title = $_POST["title"];
    } else {
        $errors['titleError'] = "Titel darf nicht leer sein!";
    }
    if (!empty($_POST["text"])) {
        $text = $_POST["text"];
    } else {
        $errors['textError'] = "Text darf nicht leer sein!";
    }

    if (empty($errors)) {
        $conn = new mysqli($host, $user, $password_db, $database);
        $result = mysqli_query($conn, "SELECT id FROM users WHERE username = '" . $_SESSION["username"] . "'");
        $row = mysqli_fetch_assoc($result);
        $id=$row['id'];



        $sql = "INSERT INTO `news`( `bild`, `titel`, `beitrag`, `user_fk`) VALUES ('$picture', '$title', '$text', '$id')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "<bc> Error: " . $sql . "<br>" . $conn->error;
        }
    }


}

?>

<div class="Form">
    <div class="contact text-center">
        <h1 class="kontaktieren">Beiträge</h1>
        <hr style="width:60%;margin-left:20%;">
        <img src="img/food.png" width="150" height="150">
        <div class="col-lg-12">
            <h2>Ich bin begeistert</h2>
        </div>
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <p>Eines der schönsten Hotels in denen ich jemals war. Sehr nettes Personal, vor allem die
                    Geschäftsführer. Auch das Essen war eine 10 von 10</p>
            </div>
            <div class="col-lg-3"></div><br>

        </div>
        <?php
            if (!empty($errors)) {
                echo '<div class="alert alert-danger">';
                foreach ($errors as $error) {
                    echo $error . '<br>';
                }
                echo '</div>';
            }
            ?>

    </div>
</div>

<?php include 'components/footer.php'; ?>