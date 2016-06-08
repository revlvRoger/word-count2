<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h1>Upload Image</h1>
<?php


class Upload
{
    public function uploadedFile($image)
    {
        $photo = md5(date('Y-m-d H:i:s')) . '.jpg';
        $image = __DIR__. '/'. $photo;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $image))
        {
        echo "<img src=\"$photo\">";
        }
    }
}
    $uploaded = new Upload();
    $uploaded->uploadedFile($image);


?>
    <form method='POST' enctype='multipart/form-data'>
        <input type='file' name='image'><br><br>
        <input name='Submit' type='submit' value='Upload image'>
        <button type="reset" value="Reset">Reset</button>
    </form>
</body>
</html>