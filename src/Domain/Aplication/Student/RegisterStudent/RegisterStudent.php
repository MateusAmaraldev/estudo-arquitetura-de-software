<?php

namespace Mateus\Arquitetura\Aplicacion\Student\RegisterStudent;

use Mateus\Arquitetura\Domain\Student\StudentRepository;
use Mateus\Arquitetura\Domain\Student\Student;

class RegisterStudent{
  private StudentRepository $studentRepository;
  public function __construct(StudentRepository $studentRepository){
    $this->studentRepository = $studentRepository;

  }
  public function execute(RegisterStudentDto $registerStudentDto) {
    $student = Student::withCpfNameAndEmail($registerStudentDto->cpf,$registerStudentDto->name,$registerStudentDto->email);
    $this->studentRepository->addStudent($student);
  }
}
