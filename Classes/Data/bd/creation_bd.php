<?php
declare(strict_types=1);
namespace bd;
use bd\Form\GenericGestionBD;

require_once("./_connection.php");

$createQuizz = <<<EOF
CREATE TABLE QUIZZ(
    idQuizz INT PRIMARY KEY NOT NULL,
    typeQuizz TEXT NOT NULL
 );
EOF;

$createQuestion = <<<EOF
CREATE TABLE QUESTION(
    uuidQuestion INT PRIMARY KEY NOT NULL,
    labelQuestion TEXT NOT NULL,
    correctAnswerQuestion TEXT NOT NULL
 );
EOF;

$createAnswer = <<<EOF
CREATE TABLE ANSWER(
    anwser TEXT NOT NULL,
    uuidQuestion INT NOT NULL,
    PRIMARY KEY (anwser, uuidQuestion),
    FOREIGN KEY (uuidQuestion) REFERENCES QUESTION (uuidQuestion)
 );
EOF;

$createContenir = <<<EOF
CREATE TABLE CONTENIR(
    idQuizz INT NOT NULL,
    uuidQuestion INT NOT NULL,
    PRIMARY KEY (idQuizz, uuidQuestion),
    FOREIGN KEY (idQuizz) REFERENCES QUIZZ (idQuizz),
    FOREIGN KEY (uuidQuestion) REFERENCES QUESTION (uuidQuestion)
);
EOF;

$createTypeQuestion = <<<EOF
CREATE TABLE TYPE_QUESTION(
    idTypeQuestion INT PRIMARY KEY NOT NULL,
    nomTypeQuestion TEXT NOT NULL
);
EOF;

$createEstUne = <<<EOF
CREATE TABLE EST_UNE(
    idTypeQuestion INT NOT NULL,
    uuidQuestion INT NOT NULL,
    PRIMARY KEY (idTypeQuestion, uuidQuestion),
    FOREIGN KEY (idTypeQuestion) REFERENCES TYPE_QUESTION (idTypeQuestion),
    FOREIGN KEY (uuidQuestion) REFERENCES QUESTION (uuidQuestion)
);
EOF;

try{
    $genericCreationBD = new GenericGestionBD($pdo);
    $genericCreationBD->requete_gestion_bd($createQuizz);
    $genericCreationBD->requete_gestion_bd($createQuestion);
    $genericCreationBD->requete_gestion_bd($createAnswer);
    $genericCreationBD->requete_gestion_bd($createContenir);
    $genericCreationBD->requete_gestion_bd($createTypeQuestion);
    $genericCreationBD->requete_gestion_bd($createEstUne);
}
catch (PDOException $e){
    var_dump($e->getMessage());
}