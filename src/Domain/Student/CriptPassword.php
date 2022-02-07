<?php

namespace Mateus\Arquitetura\Domain\Student;

interface CriptPassword{
  public function cript(string $password):string;
  public function verify(string $password, string $encryptedPassword):bool;
}