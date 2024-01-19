<?php
declare(strict_types=1);
require 'Classes/autoloader.php';
Autoloader::register();

// Importation des domaines de nom à utiliser
#use Provider\JsonLoader;
use Quizz\Type\CreationQuizz;
use Data\bd\Requetes;
use Quizz\Type\ButtonsQuizzGroup;

// $chemin_fichier = "./Data/quizz.json";
// if (!file_exists($chemin_fichier)){
//     echo "Le fichier de chemin $chemin_fichier n'existe pas\n";
// }
// $loader = new JsonLoader($chemin_fichier);
// $quizz = $loader->createQuizz();

// foreach ($quizz->getQuizz() as $lequizz){
//     echo $lequizz->render();
// }

// foreach ($quizz->getQuestions() as $question){
//     echo $question->render();
// }

// à importer du fichier _connection directement
// Connection en utlisant la connexion PDO avec le moteur en prefixe
$pdo = new PDO('sqlite:db.sqlite');
// Permet de gérer le niveau des erreurs
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$creationQuizz = new CreationQuizz($pdo);
$creationQuizz->createQuizz(Requetes::get_all_quizz($pdo));
$listeQuizz = $creationQuizz->get_liste_quizz();
$boutonsQuizzGroup = new ButtonsQuizzGroup();
foreach ($listeQuizz as $quizz){
    $boutonsQuizzGroup->addBoutonQuizz($quizz->get_type_quizz());
}
echo "<h1>Application de Quizz en PHP</h1>" . PHP_EOL;
echo $boutonsQuizzGroup->render();