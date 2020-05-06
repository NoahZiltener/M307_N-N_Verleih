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
                <input type="text" name="firstname" class="field-divided" placeholder="Vorname" />
                <input type="text" name="lastname" class="field-divided" placeholder="Nachname" />
            </li>
            <li>
                <label for="phone">Telefon</label>
                <input type="text" name="phone" class="field-long" />
            </li>
            <li>
                <label for="email">Email <span class="required">*</span></label>
                <input type="email" name="email" class="field-long" />
            </li>
            <li>
                <label for="membership">Mitgliedschaftsstatus</label>
                <select name="membership" class="field-select">
                    <?php foreach ($meberships as $membership) { ?>
                        <option value="<?= $membership->membershipid ?>"><?= $membership->membership ?></option>
                    <?php } ?>
                </select>
            </li>
            <li>
                <label for="returndate" >Ausleihfrist<span class="required">*</span></label>
                <input type="date" name="returndate" class="field-long" readonly />
            </li>
            <li>
                <label for="movie" >Film<span class="required">*</span></label>
                <select name="movie" class="field-select">
                    <?php foreach ($movies as $movie) { ?>
                        <option value="<?= $movie->movieid ?>"><?= $movie->title ?></option>
                    <?php } ?>
                </select>
            </li>
            <li>
                <button type="submit">Erstellen</button>
            </li>
        </ul>
    </form>
</body>

</html>