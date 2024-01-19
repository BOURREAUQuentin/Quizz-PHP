<?php
namespace Quizz\Type;
use Quizz\Type\Question;
class Quizz{
    private int $id;
    private string $typeQuizz;
    private array $listeQuestions;

    public function __construct(int $id, string $typeQuizz){
        $this->id = $id;
        $this->typeQuizz = $typeQuizz;
        $this->listeQuestions = array();
    }

    public function addQuestion(Question $question): void{
        array_push($this->listeQuestions, $question);
    }

    public function get_id(): int{
        return $this->id;
    }

    public function get_type_quizz(): string{
        return $this->typeQuizz;
    }

    public function getQuestions(): array{
        return $this->listeQuestions;
    }
}