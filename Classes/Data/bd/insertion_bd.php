<?php
declare(strict_types=1);
namespace bd;
use bd\Form\GenericGestionBD;

require_once("./_connection.php");

$insertQuizz = <<<EOF
insert into QUIZZ values
(1, "Geographie"),
(2, "Python"),
(3, "Java");
EOF;

$insertQuestion = <<<EOF
insert into QUESTION values
(1, "Quel est la capitale de la France ?", "Paris"),
(2, "Quel est la capitale de l'Espagne ?", "Madrid"),
(3, "Instancier la variable nombre à 10", "nombre=10"),
(4, "Que fait 10++", "11");
EOF;

$insertAnswer = <<<EOF
insert into ANSWER values
("Paris", 1),
("Marseille", 1),
("Lyon", 1),
("Barcelone", 2),
("Madrid", 2),
("nombre->10", 3),
("nombre=10", 3);
EOF;

$insertContenir = <<<EOF
insert into CONTENIR values
(1, 1),
(1, 2),
(2, 3),
(3, 4);
EOF;

$insertTypeQuestion = <<<EOF
insert into TYPE_QUESTION values
(1, "radio"),
(2, "text"),
(3, "checkbox");
EOF;

$insertEstUne = <<<EOF
insert into EST_UNE values
(1, 1),
(1, 2),
(2, 3),
(2, 4);
EOF;

try{
    $genericInsertionBD = new GenericGestionBD($pdo);
    $genericInsertionBD->requete_gestion_bd($insertQuizz);
    $genericInsertionBD->requete_gestion_bd($insertQuestion);
    $genericInsertionBD->requete_gestion_bd($insertAnswer);
    $genericInsertionBD->requete_gestion_bd($insertContenir);
    $genericInsertionBD->requete_gestion_bd($insertTypeQuestion);
    $genericInsertionBD->requete_gestion_bd($insertEstUne);
}
catch (PDOException $e){
    var_dump($e->getMessage());
}