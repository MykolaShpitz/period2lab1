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
<h2>FILM ACTOR TABLE</h2>
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
    
    $actor  = $_REQUEST['actor']; 

    if($actor  != "")
    {
        $sqlSelect = "SELECT * FROM storage_filmotek.actor 
        inner join storage_filmotek.film_actor 
            on storage_filmotek.FILM_actor.FID_actor = storage_filmotek.actor.id_actor 
        inner join storage_filmotek.film 
            on storage_filmotek.film.id_film = storage_filmotek.film_actor.fid_film
                where storage_filmotek.actor.name = :actor";

        $sth =$dbh->prepare($sqlSelect);

        $sth->execute(array('actor' => $actor));
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
    ?>
     </table>
</body>
<html>