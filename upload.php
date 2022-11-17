<?php
    echo var_dump($_FILES);

    //move the uploaded file to the uploads folder
    move_uploaded_file($_FILES['picture']['tmp_name'], 'upload/' . $_FILES['picture']['name']);
    //show the uploaded image
    echo '<img src="uploads/' . $_FILES['picture']['name'] . '" />';
?>