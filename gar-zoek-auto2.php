<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="author " content="Luke Mutter">
    <meta charset="UTF-8">
    <title>gar-zoek-auto2.php</title>
</head>
<body>
<h1>garage zoek op autokenteken 2</h1>
<p>
    Op autokenteken gegevens zoeken uit de
    tabel klanten van de database garage.
</p>
<?php
$autokenteken = $_POST["autokentekenvak"];

require_once "gar-connect.php";

$sql = $conn->prepare("
                                    select  autokenteken,
                                                automerk,
                                                autotype,
                                                autokmstand,
                                                klantid
                                        from    auto
                                        where   autokenteken = :autokenteken
                                      ");
$sql->execute(["autokenteken" => $autokenteken]);


echo "<table>";
foreach ($sql as $rij)
{
    echo "<tr>";
    echo "<td>"  . $rij["autokenteken"]       . "</td>";
    echo "<td>"  . $rij["automerk"]     . "</td>";
    echo "<td>"  . $rij["autotype"]    . "</td>";
    echo "<td>"  . $rij["autokmstand"] . "</td>";
    echo "<td>"  . $rij["klantid"]   . "</td>";
    echo "</tr>";
}
echo "</table>";
echo "<a href='gar-menu.php'> terug naar het menu </a>";
?>
</body>
</html>