<?php
namespace Mateus\Arquitetura\Domain\Student;
use Mateus\Arquitetura\Domain\Cpf;
use Mateus\Arquitetura\Domain\Email;
use Mateus\Arquitetura\Domain\Telephone;


class Student{
  private Cpf $cpf;
  private string $name;
  private Email $email;
  private array $telephones;

  public static function withCpfNameAndEmail(string $cpf, string $name,string $email) {
    return new Student(new Cpf($cpf),$name ,new Email($email));
  }
  public function __construct(Cpf $cpf, string $name,Email $email){
    $this->cpf = $cpf;
    $this->name = $name;
    $this->email = $email;

  }
  public function addTelephone(string $ddd, string $number){
    $this->telephones[] = new Telephone($ddd,$number);
    
    return $this;
  }

  public function cpf():string{
    return $this->cpf;
  }

  public function name():string{
    return $this->name;
  }

  public function email():string{
    return $this->email;
  }
/**@return Telephones[] */
  public function telephones():array{
    return $this->telephones;
  }
}