<!DOCTYPE html>
<html lang="nl">
<head>
    <meta name="author " content="Luke Mutter">
    <meta charset="UTF-8">
    <title>gar-read-auto.php</title>
</head>
<body>
<h1>garage read auto</h1>
<p>
    Dit zijn alle gegevens uit de
    tabel auto van de database garage.
</p>
<?php
require_once "gar-connect.php";

$sql = $conn->prepare("
                                        select  autokenteken,
                                                automerk,
                                                autotype,
                                                autokmstand,
                                                klantid
                                        from    auto
                                        ");
$sql->execute();

echo "<table>";
foreach ($sql as $rij)
{
    echo "<tr>";
    echo "<td>"  . $rij["autokenteken"]  . "</td>";
    echo "<td>"  . $rij["automerk"]      . "</td>";
    echo "<td>"  . $rij["autotype"]      . "</td>";
    echo "<td>"  . $rij["autokmstand"]   . "</td>";
    echo "<td>"  . $rij["klantid"]       . "</td>";
    echo "</tr>";
}
echo "</table>";
echo "<a href='gar-menu.php'> terug naar het menu </a>";
?>
</body>
</html>