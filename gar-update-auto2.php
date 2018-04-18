<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="author " content="Luke Mutter">
    <meta charset="UTF-8">
    <title>gar-update-auto2.php</title>
</head>
<body>
<h1>garage update auto 2</h1>
<p>
    Dit formulier wordt gebruikt om klantgegevens te wijzigen
    in de tabel klant van de database garage.
</p>
<?php
// klantid uit het formulier halen ----------------------------
$autokenteken = $_POST["autokentekenvak"];

// klantgegevens uit de tabel halen ---------------------------
require_once "gar-connect.php";

$autos = $conn->prepare("
select  autokenteken,
        automerk,
        autotype,
        autokmstand,
        klantid
from    auto
where   autokenteken = :autokenteken
");
$autos->execute(["autokenteken" => $autokenteken]);

// klantgegevens in een nieuw formulier laten zien ---------------
echo "<form action='gar-update-auto3.php' method='post'>";
foreach($autos as $auto)
{
    // klantid mag niet gewijzigd worden
    echo " klantid:" . $auto["klantid"];
    echo " <input type='hidden' name='klantidvak' ";
    echo " value=' " . $auto["klantid"] . " '> <br /> ";

    echo " automerk: <input type='text' ";
    echo " name  = 'automerkvak' ";
    echo " value = '" .$auto["automerk"]. "' ";
    echo " > <br />";

    echo " autotype: <input type='text' ";
    echo " name  = 'autotypevak' ";
    echo " value = '" .$auto["autotype"]. "' ";
    echo " > <br />";

    echo " autokmstand: <input type='text' ";
    echo " name  = 'autokmstandvak' ";
    echo " value = '" .$auto["autokmstand"]. "' ";
    echo " > <br />";

    echo " autokenteken: <input type='text' ";
    echo " name  = 'autokentekenvak' ";
    echo " value = '" .$auto["autokenteken"]. "' ";
    echo " > <br />";
}
echo "<input type='submit'>";
echo "</form>";

// er moet eigenlijk nog gecontroleerd worden op een bestaand klantid
?>
</body>
</html>