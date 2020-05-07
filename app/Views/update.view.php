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
    <h2>Ausleihe bearbeiten</h2>
    <form action="update" method="post">
        <input name="loanid" type="hidden" value="<?= $loan->loanid ?>" />
        <ul class="form-style-1">
            <li>
                <label for="firstname">Name<span class="required">*</span></label>
                <input type="text" name="firstname" id="firstname" class="field-divided" placeholder="Vorname" value="<?= $loan->firstname ?>" required />
                <input type="text" name="lastname" id="lastname" class="field-divided" placeholder="Nachname" value="<?= $loan->lastname ?>" required />
            </li>
            <li>
                <label for="phone">Telefon</label>
                <input type="text" name="phone" id="phone" class="field-long" value="<?= $loan->phone ?>" />
            </li>
            <li>
                <label for="email">Email <span class="required">*</span></label>
                <input type="email" name="email" id="email" class="field-long" value="<?= $loan->email ?>" required />
            </li>
            <li>
                <label for="returndate">Ausleihfrist</label>
                <input type="date" name="returndate" id="returndate" class="field-long" value="<?= $loan->returnDate ?>" readonly />
            </li>
            <li>
                <label for="movie">Film<span class="required">*</span></label>
                <select name="movie" id="movie" class="field-select" required>
                    <?php foreach ($movies as $movie) {
                        if ($movie->movieid != $loan->movie->movieid) { ?>
                            <option value="<?= $movie->movieid ?>"><?= $movie->title ?></option>
                        <?php } else { ?>
                            <option selected value="<?= $movie->movieid ?>"><?= $movie->title ?></option>
                    <?php }
                    } ?>
                </select>
            </li>
            <li>
                <label for="status">Status<span class="required">*</span></label>
                <select name="status" id="status" class="field-select">
                    <option value="0">ausgeliehen</option>
                    <option value="1">zurückgebracht</option>
                </select>
            </li>
            <li>
                <ul>
                    <?php foreach ($errors as $error) { ?>
                        <li class="error"><?= $error ?></li>
                    <?php } ?>
                </ul>
            </li>
            <li>
                <button type="button" id="cancelButton" onclick="cancel()">Abbrechen</button>
                <button type="submit">Speichern</button>
            </li>
        </ul>
    </form>
</body>

</html>