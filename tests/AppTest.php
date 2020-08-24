<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

class AppTest extends TestCase
{

// KernelTestCase
 // permet écrire des tests dans le context du kernel, permet de demarrer une application et récuperer une instance du kernel, donc du container
 // , ce sont des tests dit fonctionnels

// WebTestCase permet de tester des controllers, tester la requete et voir la réponse renvoyé par symfony, tester l'application dans sa globalité

 public function testTestsAreWorking()
 {

  $this->assertEquals(2, 1 + 1);

 }

}
