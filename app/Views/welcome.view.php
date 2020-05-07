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

    <a href="create"><button>Neue Ausleihe</button></a>

    <form action="home" method="POST">
    <button type="submit">Zurückgebracht</button>
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
                    <td><a href="update?loanid=<?= $loan->loanid ?>">
                            <button id="btnEdit">
                                <img id="editImg" src="res/edit-tools.png" alt="edit">
                            </button></a></td>
                </tr>
            <?php } ?>
        </table>
    </form>


</body>

</html>