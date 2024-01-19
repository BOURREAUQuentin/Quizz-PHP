<?php
namespace Quizz\Type;
use Quizz\Type\RadioGroup;
use Quizz\Type\BoutonsQuizzGroup;
use Quizz\Type\Text;
use Quizz\Type\Quizz;
use PDO;
class CreationQuizz{
    private array $liste_quizz;
    private PDO $pdo;

    public function __construct(PDO $pdo){
        $this->liste_quizz = array();
        $this->pdo = $pdo;
    }

    public function get_liste_quizz(): array{
        return $this->liste_quizz;
    }

    public function createQuizz(array $infosListeQuizzBD): void{
        foreach ($infosListeQuizzBD as $quizzBD){
            $indexQuizzBD = 1;
            $valeurIdQuizz = 0;
            foreach($quizzBD as $labelQuizz => $valeurQuizz){
                if ($labelQuizz == "idQuizz" || $labelQuizz == "typeQuizz"){
                    if ($indexQuizzBD % 2 == 0){
                        array_push($this->liste_quizz, new Quizz(intval($valeurIdQuizz), $valeurQuizz));
                    }
                    else{
                        $valeurIdQuizz = $valeurQuizz;
                    }
                    $indexQuizzBD ++;
                }
            }
        }
    }

    // public function addQuestion(mixed $question): void{
    //     $typeQuestion = $question["type"];
    //     $uuidQuestion = $question["uuid"];
    //     $labelQuestion = $question["label"];
    //     $correctAnswerQuestion = $question["correct"];
    //     switch ($typeQuestion) {
    //         case 'radio':
    //             $radioQuestion = new RadioGroup($uuidQuestion, $typeQuestion, $labelQuestion, $correctAnswerQuestion);
    //             $choicesRadioQuestion = $question['choices'];
    //             foreach ($choicesRadioQuestion as $choice) {
    //                 $radioQuestion->addRadioButton($choice);
    //             }
    //             array_push($this->questions, $radioQuestion);
    //             break;
    //         case 'text':
    //             $textQuestion = new Text($uuidQuestion, $typeQuestion, $labelQuestion, $correctAnswerQuestion);
    //             array_push($this->questions, $textQuestion);
    //             break;
    //     }
    // }

    // public function addQuizz(mixed $quizz): void{
    //     $labelQuizz = $quizz["typeQuizz"];
    //     $boutonQuizz = new BoutonsQuizzGroup($labelQuizz);
    //     $liste_quizz = $quizz['typeQuizz'];
    //     foreach ($liste_quizz as $quizz) {
    //         $boutonQuizz->addBoutonQuizz($quizz);
    //     }
    //     array_push($this->liste_quizz, $boutonQuizz);
    // }
}