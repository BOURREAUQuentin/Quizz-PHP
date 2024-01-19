<?php
namespace Quizz\Type;

class Button{
    private string $labelBouton;

    public function __construct(string $labelBouton){
        $this->labelBouton = $labelBouton;
    }

    public function get_labelBouton(): string{
        return $this->labelBouton;
    }
}