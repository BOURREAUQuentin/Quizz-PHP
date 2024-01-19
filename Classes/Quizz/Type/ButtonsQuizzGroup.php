<?php
declare(strict_types=1);

namespace Quizz\Type;
use Quizz\Form\GenericButton;
use Quizz\Type\Button;

class ButtonsQuizzGroup extends GenericButton{
    private array $boutons;

    public function __construct(){
        $this->boutons = array();
    }

    public function addBoutonQuizz(string $labelQuizzBouton): void{
        array_push($this->boutons, new Button($labelQuizzBouton));
    }

    public function render(): string{
        $boutonsQuizz = "<h2>Choississez un questionnaire !</h2>" . PHP_EOL;
        foreach ($this->boutons as $bouton){
            $boutonsQuizz .= sprintf("<button>%s</button>", $bouton->get_labelBouton()) . PHP_EOL;
        }
        return $boutonsQuizz;
    }
}