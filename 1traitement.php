<!DOCTYPE html>

<html>
    <link rel="stylesheet" href="style.css">
    <FONT face="Verdana">
</html>

<?php

$num = isset($_POST['num']) ? $_POST['num'] : '';
$nom = isset($_POST['nom']) ? $_POST['nom'] : '';
$age = isset($_POST['age']) ? $_POST['age'] : '';

$enfant = isset($_POST['Enfant']) ? $_POST['Enfant'] : '';
$etudiant = isset($_POST['Etudiant']) ? $_POST['Etudiant'] : '';
$employe = isset($_POST['Employé']) ? $_POST['Employé'] : '';
$senior = isset($_POST['Senior']) ? $_POST['Senior'] : '';
$pasdetravail = isset($_POST['Pasdetravail']) ? $_POST['Pasdetravail'] : '';

$prix = 15;

if($num == "") {
    echo "<a href='1.php'> Veuillez saisir un numéro </a> <br> ";
}

else if($nom == "") {
    echo "<a href='1.php'>Veuillez remplir un nom</a> <br>";
}

else if($age == "") {
    echo "<a href='1.php'>Veuillez remplir un âge</a> <br>";
}

if($num != "" && $nom != "" && $age != "" ) {

// On vérifie que le client a bien rentré un seul statut

    if( ($enfant && ($etudiant || $employe || $senior || $pasdetravail)) 

    || ($etudiant && ($enfant || $employe || $senior || $pasdetravail))

    || ($employe && ($enfant || $etudiant || $senior || $pasdetravail))

    || ($senior && ($enfant || $etudiant || $employe || $pasdetravail))

    || ($pasdetravail && ($enfant || $etudiant || $employe || $senior))) {

    echo "<p1> Vous ne devez rentrer qu'un seul statut. <br/> <br/>";
    echo "<a href='1.php'>Revenir au formulaire <br/> <br/> </a>";

    }

    else {

    // Les rabais au niveau du prix

        if($enfant) {

            $prix -= 1*$prix;
        }

        if($etudiant) {

            $prix -= 0.25*$prix;
        }

        if($employe) {

            $prix -= 0;
        }  

        if($senior) {

            $prix -= 0.2*$prix;
        }

        if($pasdetravail) {

            $prix -= 0.75*$prix;
        }

    // Les blindages au niveau du statut du client

        if( ($enfant && ($age<1 || $age>11)) 
            || ($etudiant && ($age<12 || $age>25)) 
            || ($employe && ($age<25 || $age>55)) 
            || ($senior && $age<60) 
            || ($pasdetravail && ($age<18 || $age>59)) ) {

            echo "Votre âge ne correspond pas au statut que vous avez rentré. <br/> <br/>";
            echo "<a href='1.php'>Rentrez le bon statut <br/> <br/> </a>";
        }

        else {
    
            echo "Merci ! Voici votre ticket : ";

            echo "<table border=\"1\">";
            echo "<tr>";
            echo "<th>" . "Numéro" . "</th>";
            echo "<th>" . "Nom" . "</th>";
            echo "<th>" . "Prix" . "</th>";

            echo "<tr>";
            echo "<td>" . $num . " </td>";
            echo "<td>" . $nom . " </td>";
            echo "<td>" . $prix . " €</td> <br/> <br/>";
        }
    }
}

?>