<?php
declare(strict_types=1);

namespace Quizz\Form;
use Quizz\ButtonsQuizz\InputRenderInterface;

abstract class GenericButton
{
    protected readonly string $idQuizz;

    protected string $typeQuizz;

    public function __construct(string $idQuizz, string $typeQuizz)
    {
        $this->idQuizz = $idQuizz;
        $this->typeQuizz = $typeQuizz;
    }

    public function __toString(): string
    {
        return $this->render();
    }

    function getIdQuizz(): string 
    {
        return $this->idQuizz;
    }

    function getType(): string{
        return $this->typeQuizz;
    }
}
