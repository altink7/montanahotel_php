<?php
$page = basename($_SERVER['PHP_SELF'], '.php');
include 'components/head.php';
include 'components/nav.php';
require_once('dbaccess.php');

$picture = $title = $text = "";
$errors = array();

//Checks if all fields are filled out and posts them
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_FILES["picture"])) {
        $picture = $_FILES["picture"];
        $file_type = $picture['type'];
    
        //image resource
        if ($file_type == "image/png") {
            $im = imagecreatefrompng($picture['tmp_name']);
        } else if ($file_type == "image/jpeg") {
            $im = imagecreatefromjpeg($picture['tmp_name']);
        } else {
            $errors['pictureError'] = "Invalid image format, only PNG and JPEG are allowed";
        }
    
        // Resize the image
        $im_resized = imagecreatetruecolor(150, 150);
        imagecopyresized($im_resized, $im, 0, 0, 0, 0, 150, 150, imagesx($im), imagesy($im));
        
        $path = "upload/";
        // Save the resized image to a file
        if ($file_type == "upload/") {
            imagepng($im_resized, $path.'resized.png');
        } else if ($file_type == "image/jpeg") {
            imagejpeg($im_resized, $path.'resized.jpg');
        }
        $imgContent = addslashes(file_get_contents($path.'resized.jpg'));
    
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

        $sql = "INSERT INTO `news`( `bild`, `titel`, `beitrag`, `user_fk`, `zeit`) VALUES ('$imgContent', '$title', '$text', '$id', NOW())";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "<bc> Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }


}

?>

<div class="Form">
    <div class="contact text-center">
        <h1 class="kontaktieren">Beiträge</h1>
        <?php
        $conn = new mysqli($host, $user, $password_db, $database);
        $sql = "SELECT * FROM news order by zeit desc";
        $result = $conn->query($sql);
        if (!empty($result)) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="row">';
                echo '<div class="col-lg-3"></div>';
                echo '<div class="col-lg-6">';
                echo '<img src="data:image/jpeg;base64,' . base64_encode($row['bild']) .'"/>';
                echo '<h2>' . $row['titel'] . '</h2>';
                echo '<p>' . $row['beitrag'] . '</p>';
                echo '<p style="font-size:10px;">' . $row['zeit'] . '</p>';
                echo '</div>';
                echo '<div class="col-lg-3"></div>';
                echo '</div>';
                echo '<hr style="width:60%;margin-left:20%;">';
            }

        } else {
            echo "0 results";
        }
        ?>
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