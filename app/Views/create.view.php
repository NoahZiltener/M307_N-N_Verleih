<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Vidicted</title>
    <link rel="stylesheet" href="public/css/app.css">
    <script src="public/js/app.js"></script>
</head>

<body>
    <h1>Vidicted</h1>
    <h2>Neue Ausleihen erfassen</h2>
    <form action="create" method="post">
        <ul class="form-style-1">
            <li>
                <label for="firstname">Name<span class="required">*</span></label>
                <input type="text" name="firstname" class="field-divided" placeholder="Vorname" value="<?= $loan->firstname ?>" />
                <input type="text" name="lastname" class="field-divided" placeholder="Nachname" value="<?= $loan->lastname ?>" />
            </li>
            <li>
                <label for="phone">Telefon</label>
                <input type="text" name="phone" class="field-long" value="<?= $loan->phone ?>"/>
            </li>
            <li>
                <label for="email">Email <span class="required">*</span></label>
                <input type="email" name="email" class="field-long" value="<?= $loan->email ?>"/>
            </li>
            <li>
                <label for="membership">Mitgliedschaftsstatus</label>
                <select name="membership" id="membership" class="field-select" onchange="calculateReturndate()">
                    <?php foreach ($memberships as $membership) { ?>
                        <option value="<?= $membership->loanperiod ?>"><?= $membership->membership ?></option>
                    <?php } ?>
                </select>
            </li>
            <li>
                <label for="returndate">Ausleihfrist<span class="required">*</span></label>
                <input type="date" id="returndate" name="returndate" class="field-long" readonly />
            </li>
            <li>
                <label for="movie">Film<span class="required">*</span></label>
                <select name="movie" class="field-select">
                    <?php foreach ($movies as $movie) { ?>
                        <option value="<?= $movie->movieid ?>"><?= $movie->title ?></option>
                    <?php } ?>
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
                <button type="button" id="cancelButton" onclick="cancel()">abbrechen</button>
                <button type="submit">Erstellen</button>
            </li>
        </ul>
    </form>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function(event) {
            calculateReturndate();
        });
    </script>
</body>

</html>