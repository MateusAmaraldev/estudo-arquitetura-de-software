<?php

namespace Mateus\Arquitetura\Infra\Student;

use Mateus\Arquitetura\Domain\Student\CriptPassword;

class CriptPasswordPhp implements CriptPassword
{

  public function cript(string $password): string
  {
    return password_hash($password, PASSWORD_ARGON2ID);
  }
  public function verify(string $password, string $encryptedPassword): bool
  {
    return password_verify($password, $encryptedPassword);
  }
}
