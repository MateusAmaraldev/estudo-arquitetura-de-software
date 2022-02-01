<?php 

namespace Mateus\Arquitetura\Infra\Student;

use Mateus\Arquitetura\Domain\Student\Student;
use Mateus\Arquitetura\Domain\Student\StudentRepository;
use Mateus\Arquitetura\Domain\Cpf;

class StudentRepositoryPdo implements StudentRepository{
  private \PDO $connection;
  public function __construct(\PDO $connection)
  {
    $this->connection = $connection;
  }

  public function addStudent(Student $student):void{

    $sql='INSERT INTO alunos VALUES(:cpf,:nome,:email)';
    $stmt = $this->connection->prepare($sql);

    $stmt->bindValue('cpf',$student->cpf());
    $stmt->bindValue('nome',$student->name());
    $stmt->bindValue('email',$student->email());
    $stmt->execute();
    $sql = 'INSERT INTO telefone VALUES(:numero,:cpf_aluno)';
    $stmt = $this->connection->prepare($sql);
    $stmt->bindValue('cpf_aluno',$student->cpf());

    foreach ($student->telephones() as  $telefone) {
     
      $stmt->bindValue('numero',$telefone->numero());
      $stmt->execute();
    }


  }

  public function searchByCpf(Cpf $cpf):Student{
    $sql = 'SELECT * FROM alunos LEFT JOIN telefone ON telefones.cpf_aluno=alunos.cpf_aluno WHERE alunos.cpf=?';
    $stmt = $this->connection->prepare($sql);
    $stmt->bindValue('cpf_aluno',(string)$cpf);
    $stmt->execute();
    $dadosAlunos = $stmt->fetchAll(\PDO::FETCH_ASSOC);

    if(count($dadosAlunos)=== 0){
      throw new StudentNotFound($cpf);
    }
    return $this->mappingStudent($dadosAlunos);
  }

  /** @return Student[] */
  public function searchStudents():array{

  }

  private function mappingStudent(array $dadosAlunos):Student{
    $firstLine = $dadosAlunos[0];

    $aluno =Student::withCpfNameAndEmail($firstLine['cpf'],$firstLine['nome'],$firstLine['email']);
    

  }
}