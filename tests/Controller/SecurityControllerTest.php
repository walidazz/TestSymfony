<?php

namespace App\Tests\Controller;

use Liip\TestFixturesBundle\Test\FixturesTrait;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityControllerTest extends WebTestCase
{
 use FixturesTrait;
 public function testDisplayLogin()
 {
  $client = static::createClient();
  $client->request('get', '/login');
  $this->assertResponseStatusCodeSame('200');
  $this->assertSelectorTextContains('h1', 'Se connecter');
  $this->assertSelectorNotExists('.alert.alert-danger');

 }

 public function testLoginWithBadCredential()
 {
  $client  = static::createClient();
  $crawler = $client->request('get', '/login');
  $form    = $crawler->selectButton('Se connecter')->form([
   'email'    => 'walidazzimani@gmail.com',
   'password' => '00000',
  ]);
  $client->submit($form);

  $this->assertResponseRedirects('/login');
  $client->followRedirect();

  $this->assertSelectorExists('.alert.alert-danger');

 }

//  public function testSuccessfulLogin()
 //  {
 //   $client  = static::createClient();
 //   $crawler = $client->request('get', '/login');
 //   $form    = $crawler->selectButton('Se connecter')->form([
 //    'email'    => 'walidazzimani@gmail.com',
 //    'password' => 'sharingan.',
 //   ]);
 //   $client->submit($form);

//   $this->assertResponseRedirects('/auth');
 //    $client->followRedirect();

//   $this->assertSelectorExists('.alert.alert-success');

//  }
 // ça marche pas ici
}

//  bin/phpunit --filter SecurityControllerTest
