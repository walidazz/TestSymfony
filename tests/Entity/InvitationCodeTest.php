<?php

namespace App\Tests\Entity;

use App\Entity\InvitationCode;
use Liip\TestFixturesBundle\Test\FixturesTrait;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class InvitationCodeTest extends KernelTestCase
{

 use FixturesTrait;

 public function getEntity(): InvitationCode
 {
  return (new InvitationCode())
   ->setCode("12345")
   ->setDescription("Description de test")
   ->setExpireAt(new \DateTime());

 }

 public function assertHasErrors(InvitationCode $code, $number = 0)
 {
  self::bootKernel();

  $error = self::$container->get('validator')->validate($code);

  $messages = [];

  foreach ($error as $err) {
   $messages[] = $err->getPropertyPath() . ' => ' . $err->getMessage();
  }
  $this->assertCount($number, $error, implode(', ', $messages));

 }

 public function testValidEntity()
 {

  $this->assertHasErrors($this->getEntity());

 }

 public function testInvalidEntity()
 {
  $code = $this->getEntity()->setCode("123456");
  $this->assertHasErrors($code, 1);
 }

 public function testInvalidBlankCode()
 {
  $code = $this->getEntity()->setCode("");
  $this->assertHasErrors($code, 1);
 }

 public function testInvalidDescription()
 {
  $code = $this->getEntity()->setDescription("");
  $this->assertHasErrors($code, 1);
 }

 public function testInvalidUsedCode()
 {

  //
  // $code = new InvitationCode();
  // $code->setCode("54321")
  //  ->setDescription("Description de test")
  //  ->setExpireAt(new \DateTime());
  $code = $this->getEntity()->setCode("54321");
  $this->assertHasErrors($code, 1);
 }

}
//bin/phpunit --filter InvitationCodeTest
