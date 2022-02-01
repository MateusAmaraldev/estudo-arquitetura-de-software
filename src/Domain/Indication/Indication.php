<?php
namespace Mateus\Arquitetura\Domain\Indication;
use Mateus\Arquitetura\Domain\Student\Student;

class Indication{

  private Student $indicated;
  private Student $indicator;
  private \DateTimeImmutable $date;


  public function __construct(Student $indicated, Student $indicator){
    $this->indicated = $indicated;
    $this->indicator = $indicator;
    $this->date = new \DateTimeImmutable();
  }
}