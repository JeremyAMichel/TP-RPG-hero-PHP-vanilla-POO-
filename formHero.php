<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creation Heros</title>
</head>
<body>
<form action="creationHero.php" method="post">
        <div>
            <label for="name">Nom : </label>
            <input type="text" name="name" id="name" min="2" max="99">
        </div>

        <div>
            <label for="classe">Classe :</label>

            <select name="classe" id="classe">
                <option value="magician">Magician</option>
                <option value="warrior">Warrior</option>
                <option value="rogue">Rogue</option>
            </select>
        </div>

        <div>
            <label for="difficulte">Difficulté :</label>

            <select name="difficulte" id="difficulte">
                <option value="facile">Facile</option>
                <option value="moyen">Moyen</option>
                <option value="hard">Hard</option>
            </select>
        </div>
        
        <button type="submit">Play</button>
    </form>
</body>
</html>