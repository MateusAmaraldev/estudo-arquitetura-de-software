<?php

namespace Mateus\Arquitetura\Aplicacion\Indication;

use Mateus\Arquitetura\Domain\Student\Student;

interface SendEmailIndication
{
  public function sendEmail(Student $studentIndicated):void;
}
