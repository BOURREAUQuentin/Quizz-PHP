<?php
declare(strict_types=1);
namespace bd;
use bd\Form\GenericGestionBD;

require_once("./_connection.php");

$destructQuizz = <<<EOF
DROP TABLE IF EXISTS QUIZZ;
EOF;

$destructQuestion = <<<EOF
DROP TABLE IF EXISTS QUESTION;
EOF;

$destructAnswer = <<<EOF
DROP TABLE IF EXISTS ANSWER;
EOF;

$destructQuestionContenir = <<<EOF
DROP TABLE IF EXISTS CONTENIR;
EOF;

$destructQuestionTypeQuestion = <<<EOF
DROP TABLE IF EXISTS TYPE_QUESTION;
EOF;

$destructQuestionEstUne = <<<EOF
DROP TABLE IF EXISTS EST_UNE;
EOF;

try{
    $genericDestructionBD = new GenericGestionBD($pdo);
    $genericDestructionBD->requete_gestion_bd($destructQuestionEstUne);
    $genericDestructionBD->requete_gestion_bd($destructQuestionTypeQuestion);
    $genericDestructionBD->requete_gestion_bd($destructQuestionContenir);
    $genericDestructionBD->requete_gestion_bd($destructQuestionAnswer);
    $genericDestructionBD->requete_gestion_bd($destructQuestion);
    $genericDestructionBD->requete_gestion_bd($destructQuizz);
}
catch (PDOException $e){
    var_dump($e->getMessage());
}