<?php
namespace Quizz\Type;

class Question{
    private int $uuidQuestion;
    private string $labelQuestion;
    private string $correctAnswerQuestion;

    public function __construct(int $uuidQuestion, string $labelQuestion, string $correctAnswerQuestion){
        $this->uuidQuestion = $uuidQuestion;
        $this->labelQuestion = $labelQuestion;
        $this->correctAnswerQuestion = $correctAnswerQuestion;
    }

    public function get_uuidQuestion(): int{
        return $this->uuidQuestion;
    }

    public function get_labelQuestion(): string{
        return $this->labelQuestion;
    }

    public function get_correctAnswerQuestion(): string{
        return $this->correctAnswerQuestion;
    }
}