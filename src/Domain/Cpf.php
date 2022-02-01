<?php

namespace Mateus\Arquitetura\Domain;

class Cpf{
 private string $cpf;

 public function __construct(string $cpf)
 {
    $this->setNumber($cpf);
 }

 private function setNumber(string $number):void {
   $options = [
     'options' =>[
       'regexp'=>'/\d{3}\.\d{3}\.\d{3}\-\d${2}/'
     ]
   ];
if(filter_var($number,FILTER_VALIDATE_REGEXP,$options)===false){
  throw new \InvalidArgumentException('CPF inválido');
}
   $this->cpf = $number;
 }
public function __toString(): string{
  return $this->cpf;
}
}