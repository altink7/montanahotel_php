<?php
    echo var_dump($_FILES);

    //move the uploaded file to the uploads folder
    move_uploaded_file($_FILES['picture']['tmp_name'], 'upload/' . $_FILES['picture']['name']);
    //show the uploaded image
    echo '<img src="upload/' . $_FILES['picture']['name'] . '" />';

   // check uploaded file
    if (isset($_FILES['picture'])) {
        $errors= array();
        $file_name = $_FILES['picture']['name'];
        $file_size = $_FILES['picture']['size'];
        $file_tmp = $_FILES['picture']['tmp_name'];
        $file_type = $_FILES['picture']['type'];
        
        $expensions= array("jpeg","jpg","png");
        
        if(in_array($file_ext,$expensions)=== false){
            $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }
        
        if($file_size > 2097152) {
            $errors[]='File size must be excately 2 MB';
        }
        
        if(empty($errors)==true) {
            move_uploaded_file($file_tmp,"uploads/".$file_name);
            echo "Success";
        }else{
            print_r($errors);
        }
    }    

    //open a directory, and read its contents
    if (is_dir('upload/')){
        if ($dh = opendir('upload/')){
            while (($file = readdir($dh)) !== false){
                echo " filename:" . $file . "<br>";

                echo "<a href=\"upload/".$file."\">link zum klicken</a>";
                
            }
            closedir($dh);
        }
    }
    


    //show directory content
    $dir = 'upload/';
    $files = scandir($dir);
    foreach($files as $file) {
        if($file != '.' && $file != '..') {
            echo '<img src="upload/' . $file . '" />';
        }
    }


?>
