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
<h2>Ausleihe bearbeiten</h2>

<form action="update" method="post">
        <input name="loanid" type="hidden" value="<?=$movieloan->loanid?>" />
        <ul class="form-style-1">
            <li>
                <label for="firstname">Name<span class="required">*</span></label>
                <input type="text" name="firstname" class="field-divided" placeholder="Vorname" value="<?= $movieloan->firstname ?>"/>
                <input type="text" name="lastname" class="field-divided" placeholder="Nachname" value="<?= $movieloan->lastname ?>" />
            </li>
            <li>
                <label for="phone">Telefon</label>
                <input type="text" name="phone" class="field-long" value="<?= $movieloan->phone ?>"/>
            </li>
            <li>
                <label for="email">Email <span class="required">*</span></label>
                <input type="email" name="email" class="field-long" value="<?= $movieloan->email?>"/>
            </li>
            <li>
                <label for="returndate" >Ausleihfrist<span class="required">*</span></label>
                <input type="date" name="returndate" class="field-long" value="<?= $movieloan->returnDate?>" readonly />
            </li>
            <li>
                <label for="movie" >Film<span class="required">*</span></label>
                <select name="movie" class="field-select">
                    <?php foreach ($movies as $movie) { 
                        if($movie->movieid != $movieloan->movie->movieid) { ?>
                        <option value="<?= $movie->movieid ?>"><?= $movie->title ?></option>
                        <?php }
                        else { ?>
                            <option selected value="<?= $movie->movieid?>"><?= $movie->title ?></option>
                        <?php }
                    }?>
                </select>
            </li>
            <li>
                <label for="status">Status<span class="required">*</span></label>
                <select name="status" class="field-select">
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
                <button type="button" id="cancelButton" onclick="cancel()">abbrechen</button>
                <button type="submit">speichern</button>
            </li>
        </ul>
    </form>


</body>
</html>