<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{

 private $encoder;

 public function __construct(UserPasswordEncoderInterface $encoder)
 {
  $this->encoder = $encoder;
 }

 public function load(ObjectManager $manager)
 {
  $admin = new User();
  $admin->setEmail('walidazzimani@gmail.com')
   ->setPassword($this->encoder->encodePassword($admin, 'sharingan.'))
   ->setRoles(['ROLE_USER']);
  $manager->persist($admin);
  $manager->flush();

  for ($i = 0; $i < 10; $i++) {

   $user = new User();
   $user->setEmail("user$i@gmail.com")
    ->setPassword($this->encoder->encodePassword($user, 'sharingan.'))
    ->setRoles(['ROLE_USER']);

   $manager->persist($user);
  }

  $manager->flush();
 }
}
