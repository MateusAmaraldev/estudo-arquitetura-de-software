<?php

namespace Mateus\Arquitetura\Aplicacion\Indication;


use Mateus\Arquitetura\Domain\Student\Student;

class SendEmailToStudentIndicated implements SendEmailIndication{
  private string $to;
  private string $subject;
  private string $message;

  public function __construct($to, $subject, $message)
  {
    $this->to = $to;
    $this->subject = $subject;
    $this->message = $message;
  }

  public function sendEmail(Student $studentIndicated):void{
    $this->to = $studentIndicated->email();
    $this->subject = 'Você foi indicado';
    $this->message = 'Parabéns você foi indicado';

    mail($this->to, $this->subject, $this->message);
  }
 
}
