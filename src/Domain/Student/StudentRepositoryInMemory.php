<?php

namespace Mateus\Arquitetura\Infra\Student;

use Mateus\Arquitetura\Domain\Student\Student;
use Mateus\Arquitetura\Domain\Student\StudentRepository;
use Mateus\Arquitetura\Domain\Cpf;
use Mateus\Arquitetura\Domain\Student\StudentNotFound\StudentNotFound;

class StudentRepositoryInMemory implements StudentRepository
{
  private array $students = [];

  public function addStudent(Student $student): void
  {
    $this->students[] = $student;
  }

  public function searchByCpf(Cpf $cpf): Student
  {
    $studentsFiltered = array_filter($this->students, fn (Student $student) => $student->cpf() == $cpf);
    if (count($studentsFiltered) == 0) {
      throw new StudentNotFound($cpf);
    }
    return $studentsFiltered[0];
  }

  public function searchStudents(): array
  {
    return $this->students;
  }
}
