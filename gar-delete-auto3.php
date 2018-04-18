<!DOCTYPE html>
<html lang="en">
<head>
    <title>gar-delete-auto3.php</title>
</head>
<body>
<h1>garage delete auto 3</h1>
<p>
    Op klantid gegevens zoeken uit de
    tabel klanten van de database garage
    zodat ze verwijderd kunnen worden.
</p>
<?php
// gegevens  uit het formulier halen -----------------------
$autokenteken      = $_POST["autokentekenvak"];
$verwijderen  = $_POST["verwijdervak"];

// klantgegevens verwijderen -------------------------------
if($verwijderen)
{
    require_once "gar-connect.php";

    $sql = $conn->prepare("
    delete from auto
    where autokenteken = :autokenteken
    ");

    $sql->execute(["autokenteken" => $autokenteken]);

    echo "De gegevens zijn verwijderd. <br />";
}
else {
    echo "De gegevens zijn niet verwijderd. <br />";
}
echo "<a href='gar-menu.php'>Terug naar het menu. </a>";
?>
</body>
</html>