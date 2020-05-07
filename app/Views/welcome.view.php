<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Vidicted</title>
    <link rel="stylesheet" href="public/css/app.css">
    <script src="public/js/app.js"></script>
</head>

<body>
    <h1><a href="home">Vidicted</a></h1>
    <h2>Videotheke</h2>
    <form action="home" method="POST">
        <a href="create"><button type="button">Neue Ausleihe</button></a>
        <button id="selected" type="submit">Ausgewählte abschlissen</button>
        <table>
            <tr>
                <th class="tableTitle"></th>
                <th class="tableTitle">Name</th>
                <th class="tableTitle">Video</th>
                <th class="tableTitle">Ausleihfrist</th>
                <th class="tableTitle">Ausleihstatus</th>
                <th class="tableTitle">Bearbeiten</th>
            </tr>
            <?php foreach ($loans as $loan) {
                $emoji = ($loan->returnDate >= date("Y-m-d") ? '😁' : '😠');
            ?>
                <tr>
                    <td><input type="checkbox" name="finished[]" value="<?= $loan->loanid ?>"></td>
                    <td><?= $loan->firstname . ' ' . $loan->lastname ?></td>
                    <td><?= $loan->movie->title ?></td>
                    <td><?= $loan->returnDate ?></td>
                    <td><?= $emoji ?></td>
                    <td>
                        <a href="update?loanid=<?= $loan->loanid ?>">
                            <button id="btnEdit" type="button">
                                <img id="editImg" src="public/assets/edit-tools.png" alt="edit">
                            </button>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </form>
</body>

</html>