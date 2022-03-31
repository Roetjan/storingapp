<!doctype html>
<html lang="nl">

<head>
    <title>StoringApp / Meldingen / Aanpassen</title>
    <?php require_once '../head.php'; ?>
</head>

<body>

    <?php require_once '../header.php'; ?>

    <div class="container">
        <h1>Melding aanpassen</h1>

        <?php
        require_once '../backend/conn.php' ?>

        <?php
        $id = $_GET['id'];
        $query = "SELECT * FROM meldingen WHERE id = :id";
        $statement = $conn->prepare($query);
        $statement->execute([
        ":id" => $id]);

        //5. Ophalen gegevens, tip: gebruik hier fetch().
        $melding = $statement->fetch(PDO::FETCH_ASSOC);
        ?>

        <form action="../backend/meldingenController.php" method="POST">
            <!-- (voeg hier opdracht 7 toe) -->
           
            <input type="hidden" name="action" value="edit">
            <input type="hidden" name="id" value="<?php echo$id;?>">

            <div class="form-group">
                <label>Naam attractie:</label>
                <?php echo $melding['attractie']; ?>
            </div>
            <!-- Zorg dat het type wordt getoond, net als de naam hierboven -->
            <div class="form-group">
                <label for="capaciteit">Capaciteit p/uur:</label>
                <input type="number" min="0" name="capaciteit" id="capaciteit" class="form-input" value="<?php echo $melding['capaciteit']; ?>">
            </div>
            <div class="form-group">
                <label for="prioriteit">Prio:</label>
                <!-- Let op: de checkbox blijft nu altijd uit, pas dit nog aan -->
                <input type="checkbox" name="prioriteit" id="prioriteit"
                <?php  if($melding['prioriteit']) echo 'checked'; ?>>
                <label for="prioriteit">Melding met prioriteit</label>
            </div>
            <div class="form-group"> 
                <label for="melder">Naam melder:</label>
                <!-- Voeg hieronder nog een value-attribuut toe, zoals bij capaciteit -->
                <input type="text" name="melder" id="melder" class="form-input" value="<?php echo $melding['melder']; ?>">
            </div>
            <div class="form-group">
                <label for="overig">Overige info:</label>
                <textarea name="overig" id="overig" class="form-input" rows="4" ><?php echo $melding['overige_info']; ?></textarea>
            </div>
            <input type="submit" value="Melding opslaan">

        </form>
    </div>  

</body>

</html>
