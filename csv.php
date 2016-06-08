<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<table border="2px">
    <h1>CSV File</h1>


<?php
$fileCsv = fopen("todo.csv", "r");

class FileCsv
{
    public function uploadCsv($fileCsv)
    {
        echo "<tr>
                <td>#</td>
                <td>Game</td>
                <td>Description</td>
            </tr>";

        while (($line = fgetcsv($fileCsv)) !== false)
         {
            echo "<tr>";
            foreach ($line as $cell) {
                echo "<td>" . htmlspecialchars($cell) . "</td>";
            }
            echo "</tr>\n";
        }
    }
}
$csv = new FileCsv();
$csv->uploadCsv($fileCsv);

?>
</table>
</body>
</html>
