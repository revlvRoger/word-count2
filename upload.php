<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h1>Upload Image</h1>
<?php
if(isset($_POST['Submit'])){
    // loop through the uploaded files
    foreach ($_FILES as $key => $value){
        $image_tmp = $value['tmp_name'];
        $image = $value['name'];
        $image_file = "{$UPLOADDIR}{$image}";

        // move the file to the permanent location
        if(move_uploaded_file($image_tmp,$image_file)){
            echo <<<HEREDOC
    <img src="{$image_file}" alt="file not found" /></br>
</div>
HEREDOC;
        }
        else{
            echo "<h1>image file upload failed, image too big after compression</h1>";
        }
    }
}
else{
?>
 <?php
        // var_dump($_FILES['image'], __DIR__);
        $filename = __DIR__. '/'. md5(date('Y-m-d H:i:s')) . '.jpg';

        move_uploaded_file($_FILES['image']['tmp_name'], $filename);
    ?>
    <form method='POST' enctype='multipart/form-data'>
        <input type='file' name='image'><br><br>
        <input name='Submit' type='submit' value='Upload image'>
        <button type="reset" value="Reset">Reset</button>
    </form>
<?php
}
?>
</body>
</html>