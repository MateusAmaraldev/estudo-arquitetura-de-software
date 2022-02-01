<?php 

namespace Mateus\Arquitetura\Domain\Student;

use Mateus\Arquitetura\Domain\Cpf;
interface StudentRepository{
  public function addStudent(Student $student):void;

  public function searchByCpf(Cpf $cpf):Student;

  /** @return Student[] */
  public function searchStudents():array;

}