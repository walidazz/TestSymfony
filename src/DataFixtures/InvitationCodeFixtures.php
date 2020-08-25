<?php

namespace App\DataFixtures;

use App\Entity\InvitationCode;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class InvitationCodeFixtures extends Fixture
{
 public function load(ObjectManager $manager)
 {

  $code = new InvitationCode();
  $code->setCode("54321")
   ->setDescription('Hello')
   ->setExpireAt(new \Datetime());

  $manager->persist($code);
  $manager->flush();
 }
}
