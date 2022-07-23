<?php
include "connection.php";
?>


<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lab1</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
<h2>TABLE OF FILMS FOR THE SELECTED PERIOD</h2>
<table border="1">
        <tr>
            <th>name</th>
            <th>date</th>
            <th>country</th>
            <th>quality</th>
            <th>resolution</th>
            <th>codec</th>
            <th>producer</th>
            <th>director</th>
            <th>carrier</th>
        </tr>
    <?php
    
    $date_from = $_REQUEST['date_from']; 
    $date_to = $_REQUEST['date_to']; 

    if($date_from != "")
    {
        if($date_to != "")
        {
            $sqlSelect = "SELECT * FROM storage_filmotek.film
            where storage_filmotek.film.`date` between :date_from and :date_to";

            $sth =$dbh->prepare($sqlSelect);

            $sth->execute(array('date_from' => $date_from, 'date_to' => $date_to ));
            $film = $sth->fetchAll();

            foreach($film as $row) {
                echo "<tr><td>{$row['name']}</td> 
                <td>{$row['date']}</td>
                <td>{$row['country']}</td>
                <td>{$row['quality']}</td>
                <td>{$row['resolution']}</td>
                <td>{$row['codec']}</td>
                <td>{$row['producer']}</td>
                <td>{$row['director']}</td>
                <td>{$row['carrier']}</td></tr>";
            }
        }
    }
    ?>
     </table>
</body>
<html>