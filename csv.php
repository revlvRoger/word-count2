<?php
$csvFile = file_get_contents('todo.csv');
var_dump($csvFile);

// while (($line = fgetcsv($fileCsv)) !== false) {
//                     echo "<tr>";
//                     foreach ($line as $cell) {
//                         echo "<td>" . htmlspecialchars($cell) . "</td>";
//                     }
//                     echo "</tr>\n";
//             }
//             fclose($f);
//             ?>