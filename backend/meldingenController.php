<?php
$action = $_POST['action'];

if ($action == "create")
{
    $attractie = $_POST['attractie'];
if(empty($attractie))
{

    $errors[] = "Vul de attractie-naam in.";
}



$capaciteit = $_POST['capaciteit']; 
if(!is_numeric($capaciteit))
{
    $errors[] = "Vul voor capaciteit een geldig getal in.";
}


$melder = $_POST['melder'];
if(empty($melder))
{
    $errors[] = "Vul hier een naam in.";
}


$group = $_POST['group'];
if (empty($group))
{
    $errors = "kies een type uit de lijst.";
}


$overig = $_POST['overig'];
if(isset($_POST['prioriteit']))
{
$prioriteit = true;
}
else
{
    $prioriteit = false;
}


if(isset($errors))
{
    var_dump($errors);
    die();
}



echo $attractie . " / " . $capaciteit . " / " . $melder . " / " . $overig;
echo $group;
//1. Verbinding
require_once 'conn.php';
//2. Query
$query = "INSERT INTO meldingen (attractie, capaciteit, prioriteit, melder, overige_info) 
VALUES(:attractie, :capaciteit, :prioriteit ,:melder, :overig)";
//3. Prepare
$statement = $conn->prepare($query);
//4. Execute
$statement->execute([
    ":attractie" => $attractie,
    ":capaciteit" => $capaciteit,
    ":melder" => $melder,
    ":overig" => $overig,
    ":prioriteit" => $prioriteit,
]);
header("Location: ../meldingen/index.php?msg=Melding Opgeslagen");

}

if ($action == "update")
{
}

if ($action == "delete")
{
}

//Variabelen vullen


