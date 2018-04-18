<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="author " content="Luke Mutter">
    <meta charset="UTF-8">
    <title>gar-zoek-klant2.php</title>
</head>
<body>
    <h1>garage zoek op klantid 2</h1>
    <p>
        Op klantid gegevens zoeken uit de
        tabel klanten van de database garage.
    </p>
    <?php
    $klantid = $_POST["klantidvak"];

    require_once "gar-connect.php";

    $sql = $conn->prepare("
                                    select  klantid,
                                                klantnaam,
                                                klantadres,
                                                klantpostcode,
                                                klantplaats
                                        from    klant
                                        where   klantid = :klantid
                                      ");
    $sql->execute(["klantid" => $klantid]);


    echo "<table>";
    foreach ($sql as $rij)
    {
        echo "<tr>";
            echo "<td>"  . $rij["klantid"]       . "</td>";
            echo "<td>"  . $rij["klantnaam"]     . "</td>";
            echo "<td>"  . $rij["klantadres"]    . "</td>";
            echo "<td>"  . $rij["klantpostcode"] . "</td>";
            echo "<td>"  . $rij["klantplaats"]   . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<a href='gar-menu.php'> terug naar het menu </a>";
    ?>
</body>
</html>
