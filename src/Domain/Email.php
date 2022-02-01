<?php

namespace Mateus\Arquitetura\Domain;

class Email{
 private string $address;

 public function __construct(string $address)
 {
   if(filter_var($address, FILTER_VALIDATE_EMAIL)===false){
     throw new \InvalidArgumentException("Invalid Email");
    }
    $this->address = $address;
 }

public function __toString(): string{
  return $this->address;
}
}