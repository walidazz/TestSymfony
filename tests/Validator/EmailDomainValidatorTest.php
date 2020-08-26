<?php

namespace App\Tests\Validator;

use App\Validator\EmailDomain;
use App\Validator\EmailDomainValidator;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Symfony\Component\Validator\Violation\ConstraintViolationBuilderInterface;

class EmailDomainValidatorTest extends TestCase
{

 public function testCatchBadDomains()
 {
  $validator  = new EmailDomainValidator();
  $constraint = new EmailDomain(['blocked' => ['demo@baddomain.fr']]);
  $violation  = $this->getMockBuilder(ConstraintViolationBuilderInterface::class)->getMock();
  $violation->expects($this->any())->method('setParameter')->willReturn($violation);
  $violation->expects($this->once())->method('addViolation');
  $context = $this->getMockBuilder(ExecutionContextInterface::class)->getMock();
  $context->expects($this->once())
   ->method('buildViolation')
   ->willReturn($violation);
  $validator->initialize($context);
  $validator->validate('demo@baddomain.fr', $constraint);
 }

}
//  bin/phpunit --filter EmailDomainValidatorTest
