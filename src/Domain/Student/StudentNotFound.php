<?php
namespace Mateus\Arquitetura\Domain\Student\StudentNotFound;

use Mateus\Arquitetura\Domain\Cpf;

class StudentNotFound extends \DomainException
{
  public function __construct(Cpf $cpf)
  {
    parent::__construct("Aluno com CPF $cpf não encontrado");
  }
}