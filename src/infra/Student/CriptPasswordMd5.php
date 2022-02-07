<?php

namespace Mateus\Arquitetura\Infra\Student;

use Mateus\Arquitetura\Domain\Student\CriptPassword;

class CriptPasswordMd5 implements CriptPassword
{

  public function cript(string $password): string
  {
    return md5($password);
  }
  public function verify(string $password, string $encryptedPassword): bool
  {
    return md5($password) === $encryptedPassword;
  }
}
