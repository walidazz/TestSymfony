<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
 public function load(ObjectManager $manager)
 {
  $admin = new User();
  $admin->setEmail('walidazzimani@gmail.com')
   ->setPassword("sharingan.")
   ->setRoles(['ROLE_USER']);
  $manager->persist($admin);
  $manager->flush();

  for ($i = 0; $i < 10; $i++) {

   $user = new User();
   $user->setEmail("user$i@gmail.com")
    ->setPassword("0000")
    ->setRoles(['ROLE_USER']);

   $manager->persist($user);
  }

  $manager->flush();
 }
}
