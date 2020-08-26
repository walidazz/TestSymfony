<?php

namespace App\Tests\Validator;

use App\Validator\EmailDomain;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Exception\ConstraintDefinitionException;
use Symfony\Component\Validator\Exception\MissingOptionsException as ExceptionMissingOptionsException;

class EmailDomainTest extends TestCase
{

 public function testRequiredParameters()
 {
  $this->expectException(ExceptionMissingOptionsException::class);

  new EmailDomain();

 }

 public function testBadShapedBlockedParameter()
 {

  $this->expectException(ConstraintDefinitionException::class);
  new EmailDomain(['blocked' => 'azeaze']);
 }

 public function testOptionSetAsProperty()
 {

  $arr    = ['a', 'b'];
  $domain = new EmailDomain(['blocked' => $arr]);
  $this->assertEquals($arr, $domain->blocked);

 }
}

//bin/phpunit --filter EmailDomainTest
