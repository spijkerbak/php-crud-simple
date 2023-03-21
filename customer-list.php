<?php
include 'db.php';

// get result set
$sql = "SELECT * FROM Klant ORDER BY KlantNaam";
$rs = $pdo->query($sql, PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>List</title>
    <link type="text/css" rel="stylesheet" href="layout.css">
</head>

<body>

    <nav>
        <a href=".">home</a>
        <a href="create-tables.php">reset database</a>
        <a href="customer-list.php">klanten</a>
        <a href="customer-new.php" title="add a record">nieuwe klant</a>
    </nav>

    <h1>Klanten</h1>
    <!-- show result set -->
    <table>
        <tr>
            <th></th>
            <th>Nummer</th>
            <th>Naam</th>
            <th>Verkoper</th>
            <th>Hoofdkantoor</th>
            <th></th>
        </tr>
        <?php while ($row = $rs->fetch()) { ?>
            <tr>
                <td class="button"><a title="edit" href="customer-edit.php?KlantNr=<?= $row->KlantNr ?>">?</a></td>
                <td>
                    <?= $row->KlantNr ?>
                </td>
                <td>
                    <?= $row->KlantNaam ?>
                </td>
                <td>
                    <?= $row->VerkNr ?>
                </td>
                <td>
                    <?= $row->PlaatsHfdkntr ?>
                </td>
                <td class="button"><a title="delete" href="customer-delete.php?KlantNr=<?= $row->KlantNr ?>">X</a></td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>