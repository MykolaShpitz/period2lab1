<?php include 'connection.php';?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Lab1</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="wrapper">
        <form action="genre.php" method="get">
        <label>Genre:</label><br>
        <select name="genre">
            <?php
            
            $sql = "SELECT  title FROM storage_filmotek.genre";
            foreach ($dbh->query($sql) as $row) {
                echo "<option>$row[0]</option>";
            }
            ?>
        </select>
        <input  class="buttons " type="submit" value="List films">
    </form>


    <form action="actor.php" method="get">
    <label>Actor:</label><br>
            <select name="actor">
            <?php
            $sql = "SELECT `name` FROM storage_filmotek.actor";
            foreach ($dbh->query($sql) as $row) {
                echo "<option>$row[0]</option>";
            }
            ?>
        </select>
        <input class="buttons " type="submit" value="List actors">
    </form>

    <form method="get" action="year_release.php">
        <label>Year release:</label><br>
            <label> From:
                <input type="date" name= "date_from"  >
            </label>
            <br>
            <label>  To:
                <input  class="end " type="date" name="date_to">
            </label>
            <input  class="buttons " type="submit" value="List films">
    </form>
</body>

</html>