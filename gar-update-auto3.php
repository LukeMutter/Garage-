<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="author" content="Luke Mutter"
    <meta charset="UTF-8">
    <title>gar-update-auto3.php</title>
</head>
<body>
<h1>garage update auto 3</h1>
<p>
    Klantgegevens wijzigen in de tabel
    klant van de database garage.
</p>
<?php
// klantgegevens uit het formulier halen -----------------------------
$autokenteken   = $_POST["autokentekenvak"];
$automerk       = $_POST["automerkvak"];
$autotype       = $_POST["autotypevak"];
$autokmstand    = $_POST["autokmstandvak"];
$klantid        = $_POST["klantidvak"];

// updaten klantgegevens ---------------------------------------------
require_once "gar-connect.php";

$sql = $conn->prepare
("
update auto set   autokenteken  = :autokenteken,
                  automerk      = :automerk,
                  autotype      = :autotype,
                  autokmstand   = :autokmstand
                  where autokenteken = :autokenteken
");

$sql->execute
([
    "autokenteken"  => $autokenteken,
    "automerk"      => $automerk,
    "autotype"      => $autotype,
    "autokmstand"   => $autokmstand,
    "klantid"       => $klantid
]);

echo "De klant is gewijzigd. <br />";
echo "<a href='gar-menu.php'> terug naar het menu </a>";
?>
</body>
</html>