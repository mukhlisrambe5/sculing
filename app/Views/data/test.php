<!-- View file (your_view.php) -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your View</title>
</head>

<body>

    <h1>Result Data</h1>
    <ul>
        <?php foreach ($resultData as $row): ?>
            <li>
                <?= $row->nip ?> --
                <?= $row->tmt ?> --
                <?= $row->durasi ?>
            </li>
        <?php endforeach; ?>
    </ul>

</body>

</html>