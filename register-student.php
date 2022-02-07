<?php

use Mateus\Arquitetura\Domain\Student\Student;
use Mateus\Arquitetura\Infra\Student\StudentRepositoryInMemory;

require 'vendor/autoload.php';

$cpf = $argv[1];
$name = $argv[2];
$email= $argv[3];
$ddd = $argv[4];
$telephone = $argv[5];

$aluno = Student::withCpfNameAndEmail($cpf, $name,$email)->addTelephone($ddd,$telephone);
$repository = new StudentRepositoryInMemory();
$repository->addStudent($aluno);