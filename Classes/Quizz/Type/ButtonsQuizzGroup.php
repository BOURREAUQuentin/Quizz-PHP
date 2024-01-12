<?php
declare(strict_types=1);

namespace Quizz\Type;
use Quizz\Form\InputRenderInterface;
use Quizz\Type\ButtonsQuizz;

require_once("../../Data/bd/requetes.php");

class BoutonsQuizzGroup extends GenericButton{
    private array $boutons = array();

    public function addBoutonQuizz(string $valueQuizzBouton): void{
        array_push($this->boutons, new ButtonsQuizz($valueQuizzBouton));
    }

    public function getQuizzBoutons(): array{
        return $this->boutons;
    }

    public function createBoutons(): array{
        $pdo = new PDO('sqlite:db.sqlite');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
        return Requetes::get_all_quizz($pdo);
    }

    public function render(): string{
        $button = sprintf("<h3>%s<h3/>", $this->getLabel());
        foreach ($this->boutons as $bouton){
            $boutonQuizz .= sprintf("<input type='buttonsquizz' name='%s'/>", $this->getLabel());
            $boutonQuizz .= sprintf("<label>%s</label><br><br>", $bouton->getValue());
        }
        return $boutonQuizz;
    }
}