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
<h2>FILM GENRE TABLE</h2>
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
    
    $genre_films = $_REQUEST['genre']; 

    if($genre_films != "")
    {
        $sqlSelect = "SELECT * FROM storage_filmotek.genre
        inner join storage_filmotek.film_genre on storage_filmotek.genre.id_genre = storage_filmotek.FILM_GENRE.FID_GENRE
        inner join storage_filmotek.film on storage_filmotek.film_genre.fid_film = storage_filmotek.film.id_film
        where storage_filmotek.genre.title = :genre_films";

        $sth =$dbh->prepare($sqlSelect);

        $sth->execute(array('genre_films' => $genre_films));
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